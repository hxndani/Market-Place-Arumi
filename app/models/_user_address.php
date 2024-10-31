<?php
class _user_address extends DB\SQL\Mapper
{
    function __construct(DB\SQL $db){
        parent::__construct($db, 'user_address');
    }
    function getAddress($user_id){
        $query = 'SELECT ua.province, ua.district, ua.sub_district, ua.postal, ua.detail, m.name, m.phone  FROM user_address AS ua INNER JOIN members AS m ON ua.id = m.address_id WHERE m.user_id = ?';
        $result = $this->db->exec($query, $user_id);
        return $result;
        
    }
}