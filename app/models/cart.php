<?php

class Cart extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db){
        parent::__construct($db, 'carts');
    }

    function addToCart($user_id, $product_id, $qty) {
        $this->load(['user_id=? AND product_id=?', $user_id, $product_id]);
        if ($this->dry()) {
            // Tambahkan produk baru
            $this->user_id = $user_id;
            $this->product_id = $product_id;
            $this->quantity = $qty;
            $this->save();
            // Debugging
            error_log("Produk ditambahkan ke keranjang: $product_id, Kuantitas: $qty");
        } else {
            // Perbarui kuantitas
            $this->quantity += $qty;
            $this->save();
            // Debugging
            error_log("Kuantitas diperbarui: $product_id, Kuantitas: {$this->quantity}");
        }
    }
    

     public function getCartWithProductDetails($user_id) {
        $this->load(['user_id=?', $user_id], ['order' => 'created_at DESC']);
        $cartItems = [];

        foreach ($this->query as $item) {
            // Ambil detail produk berdasarkan product_id
            $product = new _product_display($this->db); 
            $product->load(['id=?', $item['product_id']]);
            $item['product'] = $product; // Menyimpan detail produk ke item

            $cartItems[] = $item; // Menambahkan item ke array cartItems
        }

        return $cartItems; // Kembaliin semua item dengan detail produk
    }

     public function updateQuantity($cart_id, $qty) {
        $this->load(['id=?', $cart_id]);
        if (!$this->dry()) {
            $this->quantity = $qty;
            $this->save();
        }
    }
    

    // public function all(){
    //     $this->load();
    //     return $this->query;
    // }
    
    // public function getById($id){
    //     $this->load(array('id=?',$id));
    //     return $this->query;

    // }

    

    // public function edit($id){
    //     $this->load(array('id=?', $id));
    //     $this->CopyFrom('POST');
    //     $this->update();
    // }
    // public function delete($id){
    //     $this->load(array('id=?',$id));
    //     $this->erase();
    // }

}
