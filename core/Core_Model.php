<?php
class Core_Model
{
    protected $db = null;

    function __construct()
    {
        $this->connectDb();
    }
    /**
     * connect to database
     */
    function connectDb()
    {
        if($this->db === null){
            $config = require BASE_PATH."/config/database.php";
            $host = $config['host'];
            $username = $config['username'];
            $password = $config['password'];
            $database = $config['database'];

            try{
                $this->db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                // set the PDO error mode to exception
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->exec("set names utf8");
            }catch(PDOException $e){
                exit("Fail to connect database : ". $e->getMessage());
            }
            
        }
     }
}
