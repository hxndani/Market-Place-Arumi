<?php

class _product_display extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, '_vsku');
    }

    public function getAllProducts()
    {
        try {
            // return $this->db->exec("SELECT id, name, price, product_img FROM card_product");
            return $this->db->exec("SELECT * FROM _vsku ");
        } catch (\PDOException $e) {
            $err = $e->errorInfo;
            return $err;
        }
    }

    public function getDetailProduct($id)
    {
        // $product = $this->db->exec('SELECT * FROM card_product WHERE id = ?', $id);
        $product = $this->db->exec('SELECT * FROM _vsku WHERE id = ?', $id);
        return $product;
    }

    public function getById($id){
        $this->load(array('id=?', $id));
        return $this->query;

    }

    public function infoShow($type,$message){
        echo $message;
    }
    
}
