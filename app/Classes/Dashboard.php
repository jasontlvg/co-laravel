<?php


namespace App\Classes;


class Dashboard
{
    var $auth=false;
    var $encuestas=[];

    /**
     * @param mixed $encuestas
     */
    public function setEncuestas($encuesta): void
    {
//         = array_push($encuesta);
        array_push($this->encuestas, $encuesta);
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @param mixed $encuesta
     */
//    public function setEncuesta($encuesta): void
//    {
//        $this->encuesta = $encuesta;
//    }

}
