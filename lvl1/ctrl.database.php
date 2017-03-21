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
      case 'createFormForProduct':
        // To create the form to create a product
        $view = new view();
        $view->createProductForm();
        break;
      case 'createPrduct':
        $sql = "INSERT INTO `Products`(`product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_products_details`) VALUES (:product_type_code, :supplier_id, :product_name, :product_price, :other_products_details)";
        $crud->
        break;
    }
  }

?>
