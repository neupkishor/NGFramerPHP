<?php


namespace ngframerphp\core\database;

use PDO;

class Connection extends Query
{
    // Variables defined to be used
    private PDO $connection;
    private bool $connectionStatus;


    public function __construct()
    {
        $this->connect();
    }


    // Documentation >
    // Returns > Nothing.
    // Updates >
    private function connect(): void
    {
        // Read and get configuration constraints.
        if (file_exists(ROOT.'/config/database.php')){
            require_once ROOT."/config/database.php";
        }elseif (file_exists(ROOT.'/config/database.example.php')) {
            require_once ROOT."/config/database.example.php";
        }else{
            $this->connectionStatus = false;
        }

        // Define the options for the PDO Connection.
        $pdoAttributes = array(
            PDO::ATTR_PERSISTENT => true, // Always check for a PDO connection before starting one.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Error Handling method in PDO.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // PDO Returns an Associative Array Indexed by column name for result set.
        );

        try {
            $this->connection = new PDO(DB_DSN, DB_USER, DB_PASS, $pdoAttributes);
            $this->connectionStatus = true;
        }
        catch (\Throwable $th) {
            $this->connectionStatus = false;
            error_log('An error occurred: '. DB_DSN .' and '. $th->getMessage());
        }
    }
}