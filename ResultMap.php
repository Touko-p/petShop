<?php


class ResultMap
{
    var $flag;
    var $msg;

    /**
     * @param mixed $flag
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @return mixed
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }
}