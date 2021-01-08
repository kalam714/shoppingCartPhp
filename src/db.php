<?php class DB{
    public $serverName;
    public $userName;
    public $password;
    public $dbName;
    public $tableName;
    public $connection;

    public function __construct($dbName='cart',$tableName='products',$serverName='localhost',$userName='root',$password='')
    {
        $this->dbName=$dbName;
        $this->tableName=$tableName;
        $this->serverName=$serverName;
        $this->userName=$userName;
        $this->password=$password;

        //connection and check connection
        $this->connection=mysqli_connect($serverName,$userName,$password);
        if(!$this->connection){
            die('connection failed');
        }
        $sql="CREATE DATABASE IF NOT EXISTS $dbName";
        if(mysqli_query($this->connection,$sql)){
            $this->connection=mysqli_connect($serverName,$userName,$password,$dbName);
            $sql="CREATE TABLE IF NOT EXISTS $tableName(id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(40) NOT NULL,
            product_price FLOAT,
            photo VARCHAR(100)
        );";
        if(!mysqli_query($this->connection,$sql)){
            echo "Error";
        }
        }
    }
    public function getData(){
        $data="SELECT * FROM $this->tableName";
        $data=mysqli_query($this->connection,$data);
        if(mysqli_num_rows($data) >0){
            return $data;
        }
    }

}