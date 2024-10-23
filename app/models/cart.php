<?php

class Cart extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db){
        parent::__construct($db, 'carts');
    }

    function addToCart($user_id, $product_id, $quantity) {
        $this->load(['user_id=? AND product_id=?', $user_id, $product_id]);
        if ($this->dry()) {
            // Tambahkan produk baru
            $this->user_id = $user_id;
            $this->product_id = $product_id;
            $this->quantity = $quantity;
            $this->save();
            // Debugging
            error_log("Produk ditambahkan ke keranjang: $product_id, Kuantitas: $quantity");
        } else {
            // Perbarui kuantitas
            $this->quantity += $quantity;
            $this->save();
            // Debugging
            error_log("Kuantitas diperbarui: $product_id, Kuantitas: {$this->quantity}");
        }
    }
    

    public function getCartWithProductDetails($user_id) {
        $query = "
            SELECT 
                carts.id AS cart_id,
                carts.quantity,
                product.id AS product_id,
                product.name,
                product.price,
                product.image,
                IFNULL(promos.promo_price, product.price) AS final_price,
                promos.discount_percent
            FROM 
                carts
            INNER JOIN 
                product ON carts.product_id = product.id
            LEFT JOIN 
                product_promos AS promos 
            ON 
                product.id = promos.product_id 
                AND CURRENT_DATE BETWEEN promos.start_date AND promos.end_date
            WHERE 
                carts.user_id = ?
        ";
    
        $result = $this->db->exec($query, [$user_id]);
        return $result;
    }

    public function getProduct($cart_id) {
        $query = "
            SELECT 
                
                carts.quantity,
                product.id AS product_id,
                product.name,
                product.price,
                product.image,
                IFNULL(promos.promo_price, product.price) AS final_price,
                promos.discount_percent
            FROM 
                carts
            INNER JOIN 
                product ON carts.product_id = product.id
            LEFT JOIN 
                product_promos AS promos 
            ON 
                product.id = promos.product_id 
                AND CURRENT_DATE BETWEEN promos.start_date AND promos.end_date
            WHERE 
                carts.id = ?

        ";
    
        $result = $this->db->exec($query, [$cart_id]);
        return $result;
    }

    function getSelectedProducts($selected_ids) {
        $placeholders = implode(',', array_fill(0, count($selected_ids), '?'));
        $query = "
            SELECT 
                carts.id AS cart_id, 
                carts.quantity,
                product.id AS product_id,
                product.name,
                product.price,
                product.image,
                IFNULL(promos.promo_price, product.price) AS final_price,
                promos.discount_percent
            FROM 
                carts
            INNER JOIN 
                product ON carts.product_id = product.id
            LEFT JOIN 
                product_promos AS promos 
            ON 
                product.id = promos.product_id 
                AND CURRENT_DATE BETWEEN promos.start_date AND promos.end_date
            WHERE 
                carts.id IN ($placeholders)
        ";
        return $this->db->exec($query, $selected_ids);
    }

    public function getCartById($cart_id) {
        $this->load(['id=?', $cart_id]);
        if ($this->dry()) {
            error_log("Cart item with ID $cart_id not found.");
            return null;
        }
        
        // Mengembalikan data yang sudah dicast
        return $this->cast();
    }    
    
}
