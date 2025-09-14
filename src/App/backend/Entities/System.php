<?php

class System
{
    private int $id;
    private string $name;


    public function GetId(): int
    {
        return $this->id;
    }

    public function SetId(int $_id)
    {
        $this->id = $_id;
    }

    public function GetName(): string {
        return $this->name;
    }

    public function SetName(string $_name)
    {
        $this->name = $_name;
    }

}
