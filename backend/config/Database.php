<?php 
  class DBConnection {
    // DB Parameters
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    // DB Connection
    protected function connectToDB() {
      // $config = parse_ini_file('../config.ini');
      // $this->host = $config['host'];
      // $this->username = $config['username'];
      // $this->password = $config['password'];
      // $this->dbname = $config['dbname'];
      // $this->charset = $config['charset'];

      $this->host = 'localhost';
      $this->username = 'root';
      $this->password = '';
      $this->dbname = 'myblog';
      $this->charset = 'utf8mb4';
      try { 
        $pdoConnection = new PDO('mysql:host=' .$this->host. ';dbname=' .$this->dbname.';charset=' .$this->charset, $this->username, $this->password);
        $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdoConnection;
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
    }
  }
?>