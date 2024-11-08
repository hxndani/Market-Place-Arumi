<?php

class Orders extends DB\SQL\Mapper
{
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'orders');
    }

    public function  getOrders($user_id) {
        $query = "SELECT o.total_price,  o.status , oi.quantity, oi.price_at_purchase, oi.subtotal,
        p.name, p.image, p.price
        FROM orders o
        INNER JOIN order_items oi ON  o.id = oi.order_id
        INNER JOIN  product p ON oi.product_id = p.id
        WHERE  o.user_id = ?
        ORDER BY o.order_date DESC
        ";
        $result = $this->db->exec($query, [$user_id]);
        return $result;
    }

    public function getOrdersById($orderId) {
        $query = "SELECT o.id, o.total_price, o.status, oi.quantity, oi.price_at_purchase, oi.subtotal,
            p.name, p.image, p.price
            FROM orders o
            INNER JOIN order_items oi ON o.id = oi.order_id
            INNER JOIN product p ON oi.product_id = p.id
            WHERE o.id = ?";
        return $this->db->exec($query, [$orderId]);
    }
    
    public function getOrdersByStatus($user_id, $status = null) {
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        if ($status) {
            $sql .= " AND status = ?";
            return $this->db->exec($sql, [$user_id, $status]);
        }
        return $this->db->exec($sql, [$user_id]);
    }
    

    public function updateStatus($order_id, $new_status) {
        $this->load(array('id=?', $order_id));
        $this->status = $new_status;
        $this->save();
    }    

}
