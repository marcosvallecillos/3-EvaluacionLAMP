<?php
class Patient{
    private $id;
    private $name;
    private $town;
    private $address;
    function __construct($id,$name,$town,$address){
        $this->id=$id;
        $this->name=$name;
        $this->town=$town;
        $this->address=$address;    
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
 
    public function getaddress()
    {
        return $this->address;
    }

    public function getTown()
    {
        return $this->town;
    }
    public function setTown($town)
    {
        $this->town = $town;

        return $this;
    }
    public function setaddress($address)
    {
        $this->address = $address;

        return $this;
    }

   
}