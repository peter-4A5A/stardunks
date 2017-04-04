<?php

  if (ISSET($_REQUEST['do'])) {
    // If there is a action
    require 'database.class.php';
    require 'view.class.php';

    $crud = new DbHandler("localhost","stardunks","root","1234");
    $view = new view();
    switch ($_REQUEST['do']) {
      case 'getTable':
          $sql = "SELECT * FROM Products LIMIT 0, 5";
          $headerSQL = "SELECT * FROM Products LIMIT 1";
          $header = $crud->readData($headerSQL);

          $result = $crud->readData($sql);
          // Get the data

          $view->createFormTable($result, $header);
        break;
      case 'createFormForProduct':
        // To create the form to create a product
        $view->createProductForm();
        break;
      case 'createProduct':
      // Create the product
        $sql = "INSERT INTO `Products`(`product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_products_details`) VALUES ('" . $_POST['product_type_code'] . "','". $_POST['supplier_id'] ."','" . $_POST['product_name'] . "','" . $_POST['product_price'] . "','".$_POST['other_products_details'] . "')";
        echo $crud->CreateData($sql);
        break;
      case 'readProduct':
        // Get a specific row
        $sql = "SELECT * FROM Products WHERE product_id=" . $_REQUEST['product_id'] . "";
        $headerSQL = "SELECT * FROM Products LIMIT 1";

        $header = $crud->readData($headerSQL);
        $row = $crud->readData($sql);

        $view->createFormTable($row, $header);
        break;
      case 'getUpdateProduct':
        // Gets the update form for the product we will update
        $productID = $_REQUEST['productID'];

        $sql = "SELECT product_id,`product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_products_details` FROM Products WHERE product_id=" . $productID . "";
        $headerSQL = "SELECT * FROM Products";

        $header = $crud->readData($sql);
        $result = $crud->readData($sql);

        $view->createUpdateForm($result, $header);


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

        $view->createPages($result);


        break;
      case 'getPage':
        $startsFrom = $_REQUEST['pageNumber'] * 5;
        // This variable used to get the page number and * 5 to get the next page

        $sql = "SELECT * FROM Products LIMIT " . $startsFrom . "," . 5 . "";
        // Starts from is the startsfrom that contains where we Start
        // 5 is thew max amount of rows

        $headerSQL = "SELECT * FROM Products LIMIT 1";

        $row = $crud->readData($sql);
        $header = $crud->readData($headerSQL);

        $view->createFormTable($row, $header);

        break;
      case 'search':
        // To search
        $searchKeyword = $_REQUEST['searchValue'];


        $sql = "SELECT product_id ,product_name, other_products_details FROM Products WHERE product_name LIKE '%' '" . $searchKeyword . "' '%' OR other_products_details LIKE '%' '" . $searchKeyword . "' '%'";
        // We search on product name and product details

        $headerSQL = "SELECT product_id ,product_name, other_products_details FROM Products LIMIT 1";

        $header = $crud->readData($headerSQL);
        $result = $crud->readData($sql);

        $rowCount = $crud->countRow($sql);
        if ($rowCount == 0) {
          // We do nothing
          $view->displayMessage("Niks gevonden");
        }
        else if ($rowCount > 0){
          $view->createFormTable($result, $header);
        }
        break;
        case 'delete':
        // Delete a product
          $sql = "DELETE FROM `Products` WHERE product_id=" . $_REQUEST['productID'] . "";
          echo $crud->deleteData($sql);
          break;
    }
  }

?>
