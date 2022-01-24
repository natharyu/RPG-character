<?php

include_once 'Database.php';

class classList extends Database {

    public function getClasses(){
        return $this->getAll('classes');
    }

    public function getNameClass($id)
    {
        return $this->getOne('classes', 'id' , $id);
    }
}