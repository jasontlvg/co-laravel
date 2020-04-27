<?php


namespace App\Classes;


class EncuestaDash
{
    var $encuesta=0;
    var $turno_1=false;
    var $turno_2=false;
    var $enTurno2=false;

    /**
     * @param int $encuesta
     */
    public function setEncuesta(int $encuesta): void
    {
        $this->encuesta = $encuesta;
    }

    /**
     * @param bool $turno_1
     */
    public function setTurno1(bool $turno_1): void
    {
        $this->turno_1 = $turno_1;
    }

    /**
     * @param bool $turno_2
     */
    public function setTurno2(bool $turno_2): void
    {
        $this->turno_2 = $turno_2;
    }

    /**
     * @param bool $enTurno2
     */
    public function setEnTurno2(bool $enTurno2): void
    {
        $this->enTurno2 = $enTurno2;
    }

    public function getTurno1()
    {
        return $this->turno_1;
    }

}
