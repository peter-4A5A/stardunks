<?php

  if (ISSET($_REQUEST['do'])) {
    // If there is a action
    require 'database.class.php';
    require 'view.class.php';

    $crud = new DbHandler("localhost","stardunks","root","1234");
    switch ($_REQUEST['do']) {
      case 'getTable':
          $sql = "SELECT * FROM Products LIMIT 0, 5";
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
      case 'createProduct':
      // Create the product
        $sql = "INSERT INTO `Products`(`product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_products_details`) VALUES ('" . $_POST['product_type_code'] . "','". $_POST['supplier_id'] ."','" . $_POST['product_name'] . "','" . $_POST['product_price'] . "','".$_POST['other_products_details'] . "')";
        echo $crud->CreateData($sql);
        break;
      case 'readProduct':
        $sql = "SELECT * FROM Products WHERE product_id=" . $_REQUEST['product_id'] . "";
        $headerSQL = "SELECT * FROM Products LIMIT 1";

        $header = $crud->readData($headerSQL);
        $row = $crud->readData($sql);

        $view = new view();
        $view->createUpdateForm($row, $header);
        break;
      case 'updateProduct':
        $sql = "UPDATE `Products` SET `product_type_code`='" . $_REQUEST['product_type_code'] . "',`supplier_id`='" . $_REQUEST['supplier_id'] . "',`product_name`='" . $_REQUEST['product_name'] . "',`product_price`='" . $_REQUEST['product_price'] . "',`other_products_details`='" . $_REQUEST['other_products_details'] . "' WHERE product_id='" . $_REQUEST['product_id'] . "'";
        echo $crud->UpdateData($sql);
        break;
      case 'page':
      // Get the amount of pages we have
        $sql = "SELECT * FROM Products";
        $result = $crud->countRow($sql);

        $result = $result / 5;
        $result = ceil($result);

        $view = new view();
        $view->createPages($result);


        break;
      case 'getPage':
        $pageNumber = $_REQUEST['pageNumber'] * 5;
        $previousPage = $_REQUEST['pageNumber'] * 5;
        $previousPage = $previousPage - 5;

        $sql = "SELECT * FROM Products LIMIT " . $previousPage . "," . $pageNumber . "";
        $headerSQL = "SELECT * FROM Products LIMIT 1";

        $row = $crud->readData($sql);
        $header = $crud->readData($headerSQL);

        $view = new view();
        $view->createFormTable($row, $header);

        break;
    }
  }

?>
