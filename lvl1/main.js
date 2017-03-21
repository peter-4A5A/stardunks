function getRequest(request) {
  // Request all the info for every user
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
    }
  };
  xhttp.open("GET", "ctrl.database.php?do=" + request, true);
  xhttp.send();
}
function $(id) {
  // To select a div
  var element = document.getElementById(id);
  return(element);
}
function createData() {
  var productType = $("product_type_code").value;
  var supplierID = $("supplier_id").value;
  var productName = $("product_name").value;
  var productPrice = $("product_price").value;
  var otherProducts = $("other_product_details").value;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
    }
  };
  var postParameters = "do=createProduct&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + otherProducts;
  // contains te post values
  xhttp.open("POST", "ctrl.database.php?do=createProduct", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function showResult(result) {
  // To display the outcome of a request
  $("content").innerHTML = result.responseText;
}
