<?php
include_once 'Database.php';

class User extends Database{
    
    public function getAllUsers()
    {
        return $this->getAll('users');
    }
    
    public function getOneUser( $value )
    {
        return $this->getOne( 'users', 'username', $value );
    }
    public function getOneUserById( $value )
    {
        return $this->getOne( 'users', 'id', $value );
    }
    
    public function addOneUser( $data )
    {
        $this->addOne( 'users', 'username, password, role', '?, ?, ?', $data );
    }

    public function updateUser( $data, $id )
    {
        $this->updateOne( 'users', $data, 'id', $id );
    }


}