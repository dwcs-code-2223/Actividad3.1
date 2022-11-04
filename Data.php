<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Data
 *
 * @author maria
 */

class Data {

    private static $calendario = "Calendario gregoriano";

    public static function getCalendario() {
        return self::$calendario;
    }

    public static function getHora(): string {
        return date("H:m:s");
    }

    public static function getDataHora(): string {
        return self::getData() . " e son as " . self::getHora();
    }

    //http://pecl.php.net/

    public static function getData() {

        $data = new DateTime();
        //https://stackoverflow.com/questions/33869521/how-can-i-enable-php-extension-intl
        //https://www.php.net/manual/es/class.intldateformatter
        //https://docs.oracle.com/cd/E41183_01/DR/ICU_Time_Zones.html
        $fmt = new IntlDateFormatter("es_ES", IntlDateFormatter::LONG, IntlDateFormatter::FULL,
                'Europe/Madrid', IntlDateFormatter::GREGORIAN, "l d");

        $mes = $fmt->formatObject($data, "MMMM");
        $diaSemana = $fmt->formatObject($data, "EEEE");
        $dia = $fmt->formatObject($data, "dd");
        $ano = $fmt->formatObject($data, "y");

        $cadea = "Hoxe é $diaSemana $dia de $mes do $ano";

        return $cadea;
    }

}

$data = new Data();
echo "Usamos o calendario: " . Data::getCalendario() . "<br/>";

$cadea = $data::getDataHora();
echo $cadea;
