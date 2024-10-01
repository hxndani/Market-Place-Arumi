<?php

class _categories extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'categories');
    }

    public function new($data) {
        try {
            return $this->db->exec("insert into categories(ref, name, status) values $data");
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getMulti() {
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

    public function getAll() {
        try {
            $this->load(array('status=?', '1'));
            return $this->query;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

}