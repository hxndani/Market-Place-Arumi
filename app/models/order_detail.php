<?php 

class Order_detail extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'order_detail');
    }

    function getById($id){
        $this->load(array('id=?',$id));
    }


}