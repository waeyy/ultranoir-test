<?php
class PDOConnect {

  const DATABASE_HOST = "localhost";
  const DATABASE_NAME = "ultranoir";
  const DATABASE_USER = "root";
  const DATABASE_PASS  = "";

  private $PDOInstance = null;
  private static $instance = null;

  private function __construct() {

    $this->PDOInstance =  new PDO('mysql:dbname='.self::DATABASE_NAME.';host='.self::DATABASE_HOST,self::DATABASE_USER ,self::DATABASE_PASS);
    $this->PDOInstance->exec("SET CHARACTER SET utf8");
  }

  public static function getInstance() {

    if (is_null(self::$instance))
      self::$instance = new PDOConnect();

    return self::$instance;
  }

  public function query($query) {
    return $this->PDOInstance->query($query);
  }
}
