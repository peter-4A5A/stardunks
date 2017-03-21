<?php

  if (ISSET($_REQUEST['do'])) {
    // If there is a action
    require 'database.class.php';
    require 'view.class.php';

    $crud = new DbHandler("localhost","stardunks","root","1234");

    switch ($_REQUEST['do']) {
      case 'getTable':
          $sql = "SELECT * FROM Products";
          $headerSQL = "SELECT * FROM Products LIMIT 1";
          $header = $crud->readData($headerSQL);

          $result = $crud->readData($sql);
          // Get the data
          // var_dump($result);
          $view = new view();
          $view->createFormTable($result, $header);
        break;
    }
  }

?>
