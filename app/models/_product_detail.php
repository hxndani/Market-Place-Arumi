<?php

class _product_detail extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'product_detail');
    }

    public function getAll() {
        try {
            $this->load();
            return $this->query;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getMachineTime($machine) {
        try {
            $this->machine_log="SELECT machine, pol_date, pol_machine, pol_spindle FROM pol_time WHERE machine = '" . $machine . "' ORDER BY id DESC LIMIT 1";
            $this->load();
            return $this->machine_log;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function getLatestMachineTime($pol_id) {
        try {
            $this->load(array('pol_id=?', $pol_id), array('order'=>'pol_date DESC', 'limit'=>'1'));
            return $this->query;
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

    public function addPolTime($data) {
        try {
            return $this->db->exec("insert into pol_time(pol_id, pol_date, state, machine, machine_total, spindle, spindle_total, cutting) values $data");
        }
        catch(\PDOException $e)
        {
            $err=$e->errorInfo;
            return $err;
        }
    }

}