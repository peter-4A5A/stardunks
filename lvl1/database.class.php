<?php

  class DbHandler {
    // To use our database
    var $conn;
    // Properties for the database

    function __construct($serverIP, $databaseName, $username, $password) {
      // Starts when the class is called
      $serverIP = $this->checkInput($serverIP);
      $databaseName = $this->checkInput($databaseName);
      $username = $this->checkInput($username);
      $password = $this->checkInput($password);
      try {
        $conn = new PDO("mysql:host=$serverIP;dbname=$databaseName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
        return("Succes");
      }
      catch (Exception $e) {
        return ("Connection failed: " . $e->getMessage());
      }
    }
    function CreateData($sql) {
      // Create some data
      try {
        $conn = $this->conn;
        $conn->exec($sql);
        return("Succesfully created");
      } catch (Exception $e) {
        return ("Couldn't create data: " . $e->getMessage());
      }
      // $conn = null;
    }
    function readData($sql) {
      try {
        $conn = $this->conn;
        $query = $conn->prepare($sql);
        $query->execute();
        $row = $query->fetchAll(PDO::FETCH_ASSOC);
        // $row = $conn->query($sql);
        return($row);
      } catch (Exception $e) {
          return ("Couldn't read data: " . $e->getMessage());
      }
    }
    function UpdateData($sql) {
      try {
        $conn = $this->conn;
        $conn->exec($sql);
        return("Succesfully updated");
      } catch (Exception $e) {
        return ("Couldn't update data: " . $e->getMessage());
      }
    }
    function DeleteData($sql) {
      try {
        $conn = $this->conn;
        $conn->exec($sql);
        return("Succesfully");
      } catch (Exception $e) {
          return ("Couldn't update data: " . $e->getMessage());
      }
    }
    private function checkInput($data) {
      // This funcion checks the input
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      $data = htmlentities($data);
      return ($data);
    }
  }
?>
