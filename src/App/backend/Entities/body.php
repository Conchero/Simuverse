<?php


class Body{

    private int $id;
    private string $name;
    private float $mass;
    private float $rotationSpeed;
    private float $radius;
    private int $system_id;

    public function GetId() : int 
    {
        return $this->id;
    }

    public function GetName() : string
    {
        return $this->name;
    }

    public function GetMass() : float
    {
        return $this->mass;
    }

    public function GetRotationSpeed() : float
    {
        return $this->rotationSpeed;
    }

    public function GetRadius() : float
    {
        return $this->radius;
    }

    public function GetSystem_Id() : int 
    {
        return $this->system_id;
    }

}