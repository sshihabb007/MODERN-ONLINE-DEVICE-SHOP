<?php
class ShihabDatabase {
    private $host = '127.0.0.1';
    private $db_name = 'shihab_nexus_db';
    private $username = 'root';
    private $password = '';
    public $sshihabb007_pdo_instance;

    public function getConnection() {
        $this->sshihabb007_pdo_instance = null;

        try {
            $this->sshihabb007_pdo_instance = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->sshihabb007_pdo_instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->sshihabb007_pdo_instance;
    }
}

// Instantiate database and connect
$database = new ShihabDatabase();
$shihab_pdo = $database->getConnection();
?>
