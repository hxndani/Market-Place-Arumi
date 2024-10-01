<?php

class Categories extends BaseController
{

    function index($f3)
    {
        $this->f3->reroute('/');
    }

    function all($f3)
    {
        $_categories = new _categories($this->db);

        $get = $_categories->getAll();
        // echo $this->db->log();
        // print_r($data);

        $data = array();
        foreach ($get as $item):
            $parse = array(
                'id'                => $item->id,
                'ref'                => $item->ref,
                'name'                => $item->name,
                'sku'                => $item->sku,
                'type'                => $item->type,
                'status'            => $item->status,
            );
            array_push($data, $parse);
        endforeach;

        $response['type'] = 'category';
        $response['error'] = false;
        $response['data'] = $data;
        echo json_encode($response);
    }

    function add($f3)
    {
        $errors = array();
        $_categories = new _categories($this->db);

        $ref = $f3->get('POST.ref');
        $name = $f3->get('POST.name');

        $data = "('" . urldecode($f3->get('POST.ref')) .
            "','" . urldecode($f3->get('POST.name')) .
            "','1')";
        // echo $data;

        $_categories->new($data);
    }

    function category($f3) {}

    function categories($f3) {}

    function type($f3) {}
}
