<?php
class Visits {
    private $patient;
    private $amount;
    private $date;
    private $paid;

    function __construct($patient,$amount,$date,$paid)
    {
        $this->patient = $patient;
        $this->amount = $amount;
        $this->date = $date;
        $this->paid = $paid;
    }

    public function getPatient()
    {
        return $this->patient;
    }
    public function setPatient($patient)
    {
        $this->patient = $patient;

        return $this;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
    public function getPaid()
    {
        return $this->paid;
    }

    public function setpaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }
    
}