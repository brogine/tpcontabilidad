<?php

// Clase DiasHorarios
class DiasHorarios {
    
    // Variables DiasHorarios
    public $DiaSemana;
    public $HoraDesde;
    public $HoraHasta;
    public $Duracion;
    
    // Constructor DiasHorarios Vacío
    public function __construct(){ }
    
    // Constructor DiasHorarios Completo
    public function __construct1($diaSemana, $horaDesde, $horaHasta, $duracion) {
        $this->DiaSemana = $diaSemana;
        $this->HoraDesde = $horaDesde;
        $this->HoraHasta = $horaHasta;
        $this->Duracion = $duracion;
    }
}
    
?>