<?php


class Pet
{
    var $id;
    var $name;
    var $type;
    var $price;
    var $sex;
    var $age;
    var $health;
    var $Intimacy;

    public function __construct($id,$name,$type,$price,$sex,$age,$health,$Intimacy){
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->sex = $sex;
        $this->age = $age;
        $this->health = $health;
        $this->Intimacy = $Intimacy;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIntimacy()
    {
        return $this->Intimacy;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}