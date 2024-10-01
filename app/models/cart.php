<?php

class Cart extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db){
        parent::__construct($db, 'cart');
    }

    public function all(){
        $this->load();
        return $this->query;
    }
    
    public function getById($id){
        $this->load(array('id=?',$id));
        return $this->query;

    }

    public function add(){
        $this->CopyFrom('POST');
        $this->save();
    }

    public function edit($id){
        $this->load(array('id=?', $id));
        $this->CopyFrom('POST');
        $this->update();
    }
    public function delete($id){
        $this->load(array('id=?',$id));
        $this->erase();
    }

}