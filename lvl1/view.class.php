<?php

  class view {
    // We create view in here
    function createFormTable($row, $header) {
      // This function create the table where are froms in it
      $res = $row;
      echo "
      <button type='button'><a href='?do=createproduct'>Create product</a></button>
      <table class='table-hover'>

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
              <td><button class='btn btn-secondary' type='button' onclick=updateData(" . $row['product_id'] . ");>Update</button></td>
              <td><button class='btn btn-secondary' type='button' onclick=deleteData(" . $row['product_id'] . ");>Remove!</button></td>";
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
          <div></div>
          <input type='' id='' />
          <div></div>
          <input type='' id='' />
          <div></div>
          <input type='' id='' />
        </form>
      ";
    }
  }

?>
