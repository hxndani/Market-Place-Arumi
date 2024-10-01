<?php

class BaseController{

    protected $f3;
    protected $db;

	function beforeroute(){
		// echo 'Before routing - ';
	}

	function afterroute(){
		// echo '- After routing';
	}

	function __construct() {
		
		$f3=Base::instance();
		$this->f3=$f3;
		$this->f3->set('error', null);

		$db=new DB\SQL(
			$f3->get('gtdbcon'),
			$f3->get('gtdbuname'),
			$f3->get('gtdbupass'),
			array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
		);
		$this->db=$db;
    }
}