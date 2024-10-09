<?php

class _member extends DB\SQL\Mapper {
    public function __construct(DB\SQL $db) {
        parent::__construct($db, 'members');
    }

    public function getByUsername($username) {
        $this->load(array('username=?', $username));
        return $this->dry() ? null : $this->cast(); // Mengembalikan data sebagai array
    }

    public function getUsername($username){
        $this->load(array('username', $username));
        return $this->query;
    }

    public function getByName($name){
        $this->load(array('name=?', $name));
        return $this->dry() ? null : $this->cast();
    }

    public function updateProfile($username, $name, $email, $phone) {
        $this->load(array('username=?', $username)); // Memuat data berdasarkan username
        if (!$this->dry()) {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->save(); // Memperbarui data
            return true;
        }
        return false; // Jika data tidak ditemukan
    }
}
