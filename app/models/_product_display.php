<?php

class _product_display extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'product');
    }

    public function getAllProducts() {
        $sql = "SELECT p.id, p.name, p.price, p.image, p.motor, p.stock_out, 
                        pp.promo_price, pp.discount_percent , pp.start_date, pp.end_date
                FROM product p
                LEFT JOIN product_promos pp ON p.id = pp.product_id
                WHERE pp.end_date >= CURDATE() 
                OR pp.product_id IS NULL OR pp.end_date <= CURDATE()"; // Include products without promotions
        return $this->db->exec($sql);
    }
    
    

    function getProductDetail($id) {
        $sql = "SELECT product.id, product.name, product.motor, product.level, product.color, product.image, product.price, product.stock_in, product.stock_out, promos.promo_price, promos.discount_percent
        FROM product
        LEFT JOIN product_promos promos ON product.id = promos.product_id
        WHERE product.id = ?
        ";
        
        $result = $this->db->exec($sql, [$id]);
        return $result;
    }
    


    public function getById($id){
        $this->load(array('id=?', $id));
        return $this->query;

    }

    public function infoShow($type,$message){
        echo $message;
    }
    
}
