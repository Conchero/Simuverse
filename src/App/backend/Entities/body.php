<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/BaseEntity");

class Body extends BaseEntity
{

    private int $id;
    private string $name;
    private float $mass;
    private float $rotationSpeed;
    private float $radius;
    private float $distanceFromPrimaryBody;
    private int $system_id;


    public function __construct(string $_name, float $_mass, float $_rotationSpeed, float $_radius, float $_distanceFromPrimaryBody, int $_system_id)
    {
        $this->name = $_name;
        $this->mass = $_mass;
        $this->rotationSpeed = $_rotationSpeed;
        $this->radius = $_radius;
        $this->distanceFromPrimaryBody = $_distanceFromPrimaryBody;
        $this->system_id = $_system_id;
    }

    public function GetId(): int
    {
        return $this->id;
    }

    public function SetId(int $_id)
    {
        $this->id = $_id;
    }

    public function GetName(): string
    {
        return $this->name;
    }

    public function SetName(string $_name)
    {
        $this->name = $_name;
    }

    public function GetMass(): float
    {
        return $this->mass;
    }

    public function SetMass(float $_mass)
    {
        $this->mass = $_mass;
    }

    public function GetRotationSpeed(): float
    {
        return $this->rotationSpeed;
    }

    public function SetRotationSpeed(float $_rs)
    {
        $this->rotationSpeed = $_rs;
    }

    public function GetRadius(): float
    {
        return $this->radius;
    }

    public function SetRadius(float $_radius)
    {
        $this->radius = $_radius;
    }

    public function GetDistanceFromPrimaryBody(): float
    {
        return $this->distanceFromPrimaryBody;
    }

    public function SetDistanceFromPrimaryBody(float $_distance)
    {
        $this->distanceFromPrimaryBody = $_distance;
    }


    public function GetSystem_Id(): int
    {
        return $this->system_id;
    }

    public function SetSystem_Id(int $_id)
    {
        $this->system_id = $_id;
    }


    function CheckIntegrity(): bool
    {
        return true;
    }
}
