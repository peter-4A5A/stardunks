<?php

  class view {
    // We create view in here
    function createFormTable($row, $header) {
      // This function create the table where are froms in it
      $res = $row;
      echo "
      <table style='text-align: center;' class='col-11 table-hover'>

      ";
      foreach ($header as $rowheader) {
        echo "<tr>";
        foreach ($rowheader as $key => $value) {
          // To display the TH
          echo "
            <th>" . $key . "</th>
          ";
        }
        echo "</tr>";
      }
      foreach ($res as $row) {
        // To display the content
        echo "<tr>";
        foreach ($row as $key => $value) {
          else if ($key == "product_price") {
            // If we need to display a euro
            echo "<td>&euro; " . $value . "</td>";
          }
          else {
            // If the value isn't nummeric
            echo "
                <td>" . $value . "</td>
            ";
          }
        }
        echo "
              <td><button class='btn btn-secondary' type='button' onclick=getRequest('readProduct&product_id=" . $row['product_id'] . "');><i class='fa fa-book' aria-hidden='true'></i>Read</button>
              <button class='btn btn-secondary' type='button' onclick=getRequest('getUpdateProduct&productID=" . $row['product_id'] . "');><i class='fa fa-pencil' aria-hidden='true'></i>Update</button>
              <button class='btn btn-secondary' type='button' onclick=getRequest('delete&productID=" . $row['product_id'] . "');><i class='fa fa-trash-o' aria-hidden='true'></i>Delete</button></td>";
        echo "<tr>";
      }
      echo "</table>";
    }
    public function createProductForm() {
      // This function creates the form
      echo "
        <form class='col-12'>
          <div>Product Type Code</div>
          <input type='number' id='product_type_code'/>
          <div>supplier id</div>
          <input type='number' id='supplier_id' />
          <div>product name</div>
          <input type='text' id='product_name' />
          <div>product price</div>
          <input type='number' id='product_price' />
          <div>other product details</div>
          <input type='text' id='other_products_details' />
          <button type='button' onclick='postAction('createProduct');'>Save!</button>
        </form>
      ";
    }
    public function createUpdateForm($row, $header) {
      // Create a dynamicly created array
      $headerLenght = "";
      $rowLenght = "";

      echo "<table class=col-12>";
      foreach ($header as $rowheader) {
        echo "<tr>";
        foreach ($rowheader as $key => $value) {
          if ($headerLenght == 0) {
            // We do nothing because we dont wanne display the ID
            $headerLenght++;
          }
          else {
            echo "
              <th class='col-2'>" . $key . "</th>
            ";
            $headerLenght++;
          }
          // To display the TH
        }
        echo "</tr>";
      }
      foreach ($row as $res) {
        // To display the content
        echo "<tr>";
        foreach ($res as $key => $value) {
          if ($rowLenght == 0) {
            // We dont wanne show the ID so skip it!
            echo "<input type='hidden' id='" . $key . "' value='" . $value ."'/ >";
            $rowLenght++;
          }
          else {
            // If the value isn't nummeric
              echo "<td class='col-2'>";
              echo "<input type='text' id='" . $key . "' value='" . $value ."'/ >";
              echo "</td>";
            $rowLenght++;
          }
        }
        echo "</tr>";
        echo "</table>";
      }
      echo "<button type='button' class='col-1' style='margin-top: 5px;' onclick=postAction('updateProduct');>Save!</button>";
    }
    public function createPages($times) {
      // This function generates the pages
      echo "<ul class='col-12 inline underline'>";
      for ($i=0; $i < $times; $i++) {
        echo "
          <li onclick=GoToPage('" . $i . "');>" . $i . "</li>
        ";
      }
      echo "</ul>";
    }
    public function displayMessage($message) {
      // To display a short message
      echo $message;
    }
  }

?>
