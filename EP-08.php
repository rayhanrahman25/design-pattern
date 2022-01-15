<?php
abstract class AbstractDatabase{
    abstract function getConnection();
}
 abstract class Factory{
    abstract function create();
}
class MySQL extends AbstractDatabase{
    function getConnection(){
        echo "MySQL connection\n";
    }
}
class PostgreSQL extends AbstractDatabase{
    function getConnection(){
        echo "PostgreSQL connection\n";
    }
}
class SQL extends AbstractDatabase{
    function getConnection(){
        echo "SQL connection\n";
    }
}
class MySQLFactory extends Factory{
    function create(){
        return new MySQL;
    }
}
class PostgreSQLFactory extends Factory{
    function create(){
        return new PostgreSQL;
    }
}
class SQLFactory extends Factory{
    function create(){
        return new SQL;
    }
}

class DataBaseConnection{
      function getMySQLEngine(){
        return new MySQLFactory;  
      }
      function getSQLEngine(){
        return new SQLFactory;  
      }
      function PostgreSQLEngine(){
        return new  PostgreSQLFactory;  
      }
}

$dbConnection = new DataBaseConnection();
$mf = $dbConnection->getMySQLEngine();
$my = $mf->create();
 $my->getConnection();