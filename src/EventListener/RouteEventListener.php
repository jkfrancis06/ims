<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\RouterInterface;

class RouteEventListener
{

    protected $logger;
    protected $loggerDir;
    protected $loggingFile;

    protected  $router;


    public function __construct(LoggerInterface $logger, string $loggerDir, RouterInterface $router)
    {
        $this->logger=$logger;
        $this->loggerDir = $loggerDir;
        $this->loggingFile = 'log_'.date('d-m-Y').'.csv';

        $this->router = $router;

        if (!file_exists($this->loggerDir)){
            mkdir($this->loggerDir);
        }
    }

    public function onKernelRequest(ResponseEvent $event){


        $response = $event->getRequest();

        $pattern = "_wdt";

        if(!str_contains($response->getUri(),$pattern)){

            $data = [
                date('d-m-Y H:i:s'),
                $response->getMethod(),
                $response->getUri(),
                $response->getUser(),
            ];

            $file = fopen($this->loggerDir.'/'.$this->loggingFile,"a");

            fputcsv($file, $data);

            fclose($file);

            $this->logger->critical($this->loggerDir);
        }





    }

}