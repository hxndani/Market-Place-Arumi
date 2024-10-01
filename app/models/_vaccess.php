<?php

class _vaccess extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'view_access');
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

}