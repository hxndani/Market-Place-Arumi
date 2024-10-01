<?php

class _admin extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db) {
        parent::__construct($db, '_admin');
    }

    public function checkUsername($username) {
        try {
            $this->check="SELECT EXISTS(SELECT * FROM _admin WHERE username = '".$username."')";
            $this->load();
            return $this->check;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function checkEmail($email) {
        try {
            $this->check="SELECT EXISTS(SELECT * FROM _admin WHERE email = '".$email."')";
            $this->load();
            return $this->check;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getPasswordByUsername($username) {
        try {
            $this->get_pass="SELECT password from _admin where username='".$username."'";
            $this->load();
            return $this->get_pass;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getPasswordByEmail($email) {
        try {
            $this->get_pass="SELECT password from _admin where email='".$email."'";
            $this->load();
            return $this->get_pass;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

}