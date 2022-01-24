<?php 

abstract class Database
{
    private static $_dbConnect;
    
    private static function setDb()
    {
        self::$_dbConnect = new PDO( 'mysql:host=your-mysql-host-address;dbname=your-db;charset=utf8', 'your-mysql-user', 'your-mysql-password' );
        self::$_dbConnect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    }
    
    protected function getDb()
    {
        if( self::$_dbConnect == null)
        {
            self::setdB();
        }
        
        return self::$_dbConnect;
    }

    protected function getAll( $table )
    {
        $sql = 'SELECT * FROM ' . $table;
        $query = $this->getDb()->prepare( $sql );
        $query->execute();
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }
    
    protected function getOne( $table, $condition, $value )
    {
        $sql = 'SELECT * FROM '. $table .' WHERE '. $condition .' = ?';
        $query = $this->getDb()->prepare( $sql );
        $query->execute( [$value] );
        return $query->fetch( PDO::FETCH_ASSOC );
    }
    
    protected function addOne( $table, $columns, $values, $data )
    {
    $sql = 'INSERT INTO '. $table . '( ' . $columns . ' ) VALUES ( ' . $values . ' )';
    $query = $this->getDb()->prepare( $sql );
    $query->execute( $data );
    }

    public function updateOne( $table, $newData, $condition, $unique)
    {
        $sets = '';

        foreach( $newData as $key => $value)
        {
            $sets .= "$key = :$key,";
        }

        $sets = substr( $sets, 0, -1 );

        $sql = "UPDATE $table SET $sets WHERE $condition = :$condition";
        $query = $this->getDb()->prepare( $sql );

        foreach( $newData as $key => $value )
        {
            $query->bindvalue( ":$key", $value );
        }

        $query->bindvalue( ":$condition", $unique );
        $query->execute();
    }

}
