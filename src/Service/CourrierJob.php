<?php

namespace App\Service;

use App\Entity\Courrier;

class CourrierJob
{

    private $num;

    public function __construct()
    {
        $this->num = 1;
    }


    public function count(Courrier $courrier){


        $this->tt($courrier);

        return $this->num*2;



    }

    private function tt(Courrier $courrier){

        if ($courrier->getResponseTo() != null) {

            $this->num ++;

            $this->tt($courrier->getResponseTo());

        }else{
            return $this->num;
        }
    }



}