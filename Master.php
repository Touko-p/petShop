<?php


class Master
{
    var $username;
    var $password;
    var $money;
    var $name;
    var $pet;

    public function __construct($username,$password,$name,$money){
        $this->username=$username;
        $this->password=$password;
        $this->money=$money;
        $this->name=$name;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
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
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money)
    {
        $this->money = $money;
    }
    /**
     * @param mixed $pet
     */
    public function setPet($pet)
    {
        $this->pet = $pet;
    }

    /**
     * @return mixed
     */
    public function getPet()
    {
        return $this->pet;
    }
}