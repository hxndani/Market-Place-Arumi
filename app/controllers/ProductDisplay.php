<?php

class ProductDisplay extends BaseController
{

    public function showAllProducts($f3)
    {
        $_products = new _product_display($this->db);

        // try {
        $get = $_products->getAllProducts();

        $data = array();
        foreach ($get as $item) {
            $parse = array(
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'image' => $item['image'],
                'motor' => $item['motor'],
                'sold' => $item['stock_out']
            );
            array_push($data, $parse);
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        // } catch (Exception $e) {
        //     error_log($e->getMessage());
        //     header("HTTP/1.1 500 Internal Server Error");
        //     echo json_encode(["error" => "Internal Server Error"]);
        // }
    }

    public function showDetailProducts($f3, $params)
    {
        $id = $params['id'];
        $_products = new _product_display($this->db);

        // try {
        $get = $_products->getDetailProduct($id);

        $data = array();
        foreach ($get as $item) {
            $parse = array(
                'id' => $item['id'],
                'name' => $item['name'],
                'price' => $item['price'],
                'image' => $item['image'],
                'motor' => $item['motor'],
                'stock' => $item['stock_in'] - $item['stock_out'],
                'sold' => $item['stock_out']
            );
            array_push($data, $parse);
        }

        header('Content-Type: application/json');
        echo json_encode($data);
        // } catch (Exception $e) {
        // error_log($e->getMessage());
        // header("HTTP/1.1 500 Internal Server Error");
        // echo json_encode(["error" => "Internal Server Error"]);
        // }
    }
}
