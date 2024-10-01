<?php

class Products extends BaseController
{

    function index($f3)
    {
        $this->f3->reroute('/');
    }

    function add($f3)
    {
        $errors = array();
        $_products = new _products($this->db);

        $ref = $f3->get('POST.ref');
        $cat = $f3->get('POST.cat');
        $name = $f3->get('POST.name');
        $detail = $f3->get('POST.detail');

        $data = "('" . urldecode($f3->get('POST.ref')) .
            "','" . urldecode($f3->get('POST.cat')) .
            "','" . urldecode($f3->get('POST.name')) .
            "','" . urldecode($f3->get('POST.detail')) .
            "','1')";
        // echo $data;

        $_products->add($data);
    }

    function product($f3)
    {
        $_products = new _products($this->db);

        $get = $_products->product($f3->get('PARAMS.ref'));
        // echo $this->db->log();
        // print_r($data);

        $data = array();
        foreach ($get as $item):
            $parse = array(
                'id'                => $item->id,
                'ref'                => $item->ref,
                'ref_category'        => $item->ref_category,
                'name'                => $item->name,
                'detail'            => $item->detail,
                'status'            => $item->status,
            );
            array_push($data, $parse);
        endforeach;

        $response['type'] = 'product';
        $response['error'] = false;
        $response['data'] = $data;
        echo json_encode($response);
    }

    function products($f3)
    {
        $_products = new _products($this->db);

        $get = $_products->products();
        // echo $this->db->log();
        // print_r($data);

        $data = array();
        foreach ($get as $item):
            $parse = array(
                'id'                => $item->id,
                'ref'                => $item->ref,
                'ref_category'        => $item->ref_category,
                'name'                => $item->name,
                'detail'            => $item->detail,
                'status'            => $item->status,
            );
            array_push($data, $parse);
        endforeach;

        $response['type'] = 'product';
        $response['error'] = false;
        $response['data'] = $data;
        echo json_encode($response);
    }

    function category($f3)
    {
        $_products = new _products($this->db);

        $get = $_products->category($f3->get('PARAMS.ref'));
        // echo $this->db->log();
        // print_r($data);

        $data = array();
        foreach ($get as $item):
            $parse = array(
                'id'                => $item->id,
                'ref'                => $item->ref,
                'ref_category'        => $item->ref_category,
                'name'                => $item->name,
                'detail'            => $item->detail,
                'status'            => $item->status,
            );
            array_push($data, $parse);
        endforeach;

        $response['type'] = 'product';
        $response['error'] = false;
        $response['data'] = $data;
        echo json_encode($response);
    }
}
