<?php

require_once ('KredytForm.class.php');
require_once ('KredytWynik.class.php');
class KredytKontroler {
    public $form;
    public $result;
    public $error;

    public function __construct(){
        $this->form = new KredytForm();
        $this->result = new KredytWynik();
    }

    public function getParams(){
        $this->form->kwota = isset($_REQUEST['kwota_p']) ? $_REQUEST['kwota_p'] : null;
        $this->form->oprocentowanie = isset($_REQUEST['oprocentowanie_i']) ? $_REQUEST['oprocentowanie_i'] : null;
        $this->form->lata = isset($_REQUEST['lata_n']) ? $_REQUEST['lata_n'] : null;
    }

    public function validate() {
        if (! (isset($this->form->kwota) && isset($this->form->oprocentowanie) && isset($this->form->lata))) {
            return 'Wszystkie pola muszą być uzupełnione.';
        }
        
        if ($this->form->kwota == "" || $this->form->oprocentowanie == "" || $this->form->lata == "") {
            return 'Żadne z pól nie może być puste.';
        }
        
        if (!is_numeric($this->form->kwota) || !is_numeric($this->form->oprocentowanie) || !is_numeric($this->form->lata)) {
            return 'Wszystkie pola muszą być liczbami.';
        }
        
        return null;
    }

    public function process(){
        $this->getParams();
        
        $this->error = $this->validate();
        if ($this->error === null) {
            $miesiace = $this->form->lata * 12;
            $oprocentowanie_miesieczne = ($this->form->oprocentowanie / 100) / 12;
            $this->result->wynik = ($this->form->kwota * $oprocentowanie_miesieczne) / (1 - pow((1 + $oprocentowanie_miesieczne), -$miesiace));
            $this->result->wynik = round($this->result->wynik, 2);
        }
    }
}
