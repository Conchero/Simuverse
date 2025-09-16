<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/backend/Entities/BaseEntity.php");

class Body extends BaseEntity
{

    private int $id;
    private string $name;
    private string $mass;
    private string $rotationSpeed;
    private string $radius;
    private string $distanceFromPrimaryBody;
    private int $system_id;


    public function __construct(string $_name, string $_mass, string $_rotationSpeed, string $_radius, string $_distanceFromPrimaryBody, int $_system_id)
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

    public function GetMass(): string
    {
        return $this->mass;
    }

    public function SetMass(string $_mass)
    {
        $this->mass = $_mass;
    }

    public function GetRotationSpeed(): string
    {
        return $this->rotationSpeed;
    }

    public function SetRotationSpeed(string $_rs)
    {
        $this->rotationSpeed = $_rs;
    }

    public function GetRadius(): string
    {
        return $this->radius;
    }

    public function SetRadius(string $_radius)
    {
        $this->radius = $_radius;
    }

    public function GetDistanceFromPrimaryBody(): string
    {
        return $this->distanceFromPrimaryBody;
    }

    public function SetDistanceFromPrimaryBody(string $_distance)
    {
        $this->distanceFromPrimaryBody = $_distance;
    }


    public function GetSystemId(): int
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
