<?php
include_once 'Database.php';

class Character extends Database
{
    public function getCharacter()
    {
        return $this->getAll('personnage');
    }

    public function getCharacterByName($name)
    {
        return $this->getOne('personnage', 'pseudo', $name);
    }
    
    public function getCharacterById($id)
    {
        return $this->getOne( 'personnage', 'id', $id );
    }

    public function addCharacter($data)
    {
        $this->addOne('personnage', 'user, pseudo, classe, age', '?, ?, ?, ?', $data);
    }

    public function updateCharacter( $data, $id )
    {
        $this->updateOne( 'personnage', $data, 'id', $id );
    }

    public function getCharacterByUser($userId)
    {
        $sql = 'SELECT * FROM personnage WHERE user = ?';
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$userId]);
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function deleteCharacter($id)
    {
        $sql = "DELETE FROM personnage WHERE id = ?";
        $query = $this->getDb()->prepare( $sql );
        $query->execute([$id]);
    }
}