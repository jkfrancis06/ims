<?php

namespace App\EventListener;

use http\Env\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Security;

class RouteEventListener
{

    protected $logger;
    protected $loggerDir;
    protected $projectDir;
    protected $loggingFile;
    protected $security;

    const ROUTE_NAME = "routes_ims.csv";

    public function __construct(LoggerInterface $logger, string $loggerDir, string $projectDir, Security $security)
    {


        $this->logger=$logger;
        $this->loggerDir = $loggerDir;
        $this->projectDir = $projectDir;
        $this->loggingFile = 'log_'.date('d-m-Y').'.csv';


        $this->security = $security;

        if (!file_exists($this->loggerDir)){
            mkdir($this->loggerDir);
        }
    }

    public function onKernelController(ControllerEvent $event){


        $response = $event->getRequest();

        $pattern = "_wdt";

        $user = 0;

        if ($this->security->getUser() != null){
            $user = $this->security->getUser()->getId();
        }


        /*
         * Parser le fichier de correspondance des routes
         */

        $routes = [];


        if (file_exists($this->projectDir.'/public/'.self::ROUTE_NAME)) {

            if (($handle = fopen($this->projectDir.'/public/'.self::ROUTE_NAME, "r")) !== FALSE) {

                while (($row = fgetcsv($handle, null, ";")) !== FALSE) {


                    $route_item = [];
                    $route_item['name'] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row[0] );
                    $route_item['description'] = $row[1];

                    array_push($routes, $route_item);

                }
                fclose($handle);
            }
        }




        if(!str_contains($response->getUri(),$pattern)){

            $route_description = "";

            foreach ($routes as $route) {

                if (trim($response->attributes->get('_route')) == trim($route['name'])) {

                    $route_description = $route['description'];
                }
            }

            $data = [
                $response->attributes->get('_route'),
                $route_description,
                date('d-m-Y H:i:s'),
                $response->getMethod(),
                $response->getRequestUri(),
                $user,
                $event->getRequest()->getClientIp()

            ];

            $file = fopen($this->loggerDir.'/'.$this->loggingFile,"a");

            fputcsv($file, $data);

            fclose($file);

            $this->logger->critical($this->loggerDir);
        }





    }

}