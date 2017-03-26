<?php

  class view {
    // We create view in here
    function createFormTable($row, $header) {
      // This function create the table where are froms in it
      $res = $row;
      echo "
      <button class='col-2' onclick=getRequest('createFormForProduct'); type='button'>Create product</button>
      <table style='text-align: center;' class='col-12 table-hover'>

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
          if (is_numeric($value)) {
            // If the value is numeric it is a ID
            // So we only display it
            echo "<td>" . $value . "</td>";
          }
          else {
            // If the value isn't nummeric
            echo "
                <td>" . $value . "</td>
            ";
          }
        }
        echo "
              <td><button class='btn btn-secondary' type='button' onclick=readData(" . $row['product_id'] . ");><i class='fa fa-book' aria-hidden='true'></i>Read</button>
              <button class='btn btn-secondary' type='button' onclick=updateData(" . $row['product_id'] . ");><i class='fa fa-pencil' aria-hidden='true'></i>Update</button>
              <button class='btn btn-secondary' type='button' onclick=deleteData(" . $row['product_id'] . ");><i class='fa fa-trash-o' aria-hidden='true'></i>Delete</button></td>";
        echo "<tr>";
      }
      echo "</table>";
    }
    public function createProductForm() {
      // This function creates the form
      echo "
        <form>
          <div>Product Type Code</div>
          <input type='number' id='product_type_code'/>
          <div>supplier id</div>
          <input type='number' id='supplier_id' />
          <div>product name</div>
          <input type='text' id='product_name' />
          <div>product price</div>
          <input type='number' id='product_price' />
          <div>other product details</div>
          <input type='text' id='other_product_details' />
          <button type='button' onclick='createData();'>Save!</button>
        </form>
      ";
    }
  }

?>
