<?php

class _access extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db) {
        parent::__construct($db, '_access');
    }

    public function getAll() {
        try {
            $this->load();
            return $this->query;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function checkUsername($username) {
        try {
            $this->check="SELECT EXISTS(SELECT * FROM _access WHERE username = '".$username."')";
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
            $this->check="SELECT EXISTS(SELECT * FROM _access WHERE email = '".$email."')";
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
            $this->get_pass="SELECT password from _access where username='".$username."'";
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
            $this->get_pass="SELECT password from _access where email='".$email."'";
            $this->load();
            return $this->get_pass;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getLevelByUsername($username) {
        try {
            $this->get_level="SELECT level from _access where username='".$username."'";
            $this->load();
            return $this->get_level;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getLevelByEmail($email) {
        try {
            $this->get_level="SELECT level from _access where email='".$email."'";
            $this->load();
            return $this->get_level;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function newAccess($data)
    {
        try {
            return $this->db->exec("insert into _access(ref, username, email, password, level, status) values $data");
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

}