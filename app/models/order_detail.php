<?php 

class Order_detail extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'order_items');
    }

    function getById($id){
        $this->load(array('id=?',$id));
    }

    public function order_detail($order_id, $product_id, $quantity, $price, $subtotal){
        $this->order_id = $order_id;
        $this->quantity = $quantity;
        $this->price_at_purchase = $price;
        $this->subtotal = $subtotal;
        $this->product_id = $product_id;
        $this->save();  

    }

}
