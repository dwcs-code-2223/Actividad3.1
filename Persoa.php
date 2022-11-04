<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Persona
 *
 * @author maria
 */
class Persoa {

    private $nome;
    private $data_nacemento;
    private $sexo;

    public function __construct(string $nome, 
            DateTime $data_nacemento,
            $sexo = 'H') {
        $this->nome = $nome;
        $this->data_nacemento = $data_nacemento;
        $this->sexo = $sexo;
    }

    public function diasVivo() {
        //https://www.php.net/manual/es/class.datetime.php
        $now = new DateTime();
        $interval = $now->diff($this->data_nacemento);
        
        //https://www.php.net/manual/en/class.dateinterval.php
        
        echo "$this->nome ten $interval->y anos, $interval->m meses, $interval->d dias, un total de $interval->days días <br/>";
        //otra opción:
        $cadea = $interval->format(" %y anos, %m meses, %d días, un total de %a días");
        echo "$this->nome ten".
              $cadea."<br/>";
    }

    public function mostrarSexo() {

        if ($this->sexo === "H") {
            $sexo = "home";
        } elseif ($this->sexo === "M") {
            $sexo = "muller";
        } else {
            $sexo = "descoñecido";
        }

        echo "O seu sexo é $sexo";
    }
    
   

}

$pedro = new Persoa("Pedro", new DateTime("2017-07-10"));
$pedro->diasVivo();
$pedro->mostrarSexo();
