<?php

class ProductDisplay extends BaseController
{

    public function showAllProducts($f3) {
        $_products = new _product_display($this->db);
        $get = $_products->getAllProducts();
    
        $data = array();
        foreach ($get as $item) {
            $parse = array(
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'image' => $item['image'],
                'motor' => $item['motor'],
                'sold' => $item['stock_out'],
                'promo_price' => $item['promo_price'], // Tambahkan promo_price
                'discount_percent' => $item['discount_percent'], // Tambahkan discount_percent
                'start_date' => $item['start_date'],
                'end_date' => $item['end_date']

            );
            array_push($data, $parse);
        }
    
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    

    public function showDetailProducts($f3, $params) {
        $id = $params['id'];
        $_products = new _product_display($this->db);
        $get = $_products->getDetailProduct($id);
    
        if ($get) {
            $product = $get[0];  // Hanya satu produk berdasarkan ID
            $data = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'final_price' => $product['final_price'],  // Harga promo atau harga asli
                'image' => $product['image'],
                'motor' => $product['motor'],
                'stock' => $product['stock_in'] - $product['stock_out'],
                'sold' => $product['stock_out']
            ];
    
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            header("HTTP/1.1 404 Not Found");
            echo json_encode(["error" => "Product not found"]);
        }
    }
    
    
}
