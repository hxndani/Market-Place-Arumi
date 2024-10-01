<?php

class _products extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'products');
    }

    public function all()
    {
        try {
            $this->load(array('status=?', '1'));
            return $this->query;
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }

    public function new($data)
    {
        try {
            return $this->db->exec("insert into products(ref, ref_category, name, detail, status) values $data");
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }

    public function product($ref)
    {
        try {
            $this->load(array('ref=? AND status=?', $ref, '1'));
            return $this->query;
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }

    public function products()
    {
        try {
            $this->load(array('status=?', '1'));
            return $this->query;
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }

    public function category($cat)
    {
        try {
            $this->load(array('ref_category=? AND status=?', $cat, '1'));
            return $this->query;
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }
}
