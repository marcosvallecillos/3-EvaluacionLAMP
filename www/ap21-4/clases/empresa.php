<?php
class Empresa{
    protected $id;
    protected $company;
    protected $investment;
    protected $date;
    protected $active;


    function __construct($id, $company, $investment, $date, $active){
        $this->id = $id;
        $this->company = $company;
        $this->investment = $investment;
        $this->date = $date;
        $this->active = $active;

    }

    
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    
    public function setInvestment($investment)
    {
        $this->investment = $investment;

        return $this;
    }

    
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    
    public function getId()
    {
        return $this->id;
    }

    
    public function getCompany()
    {
        return $this->company;
    }

    
    public function getInvestment()
    {
        return $this->investment;
    }

    
    public function getDate()
    {
        return $this->date;
    }
	public function getActive()
    {
        return $this->active;
    }

}
?>