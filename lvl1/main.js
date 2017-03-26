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
function postAction(action) {
  // Action contains on what we gonne do update or delete of create data
  var productType = $("product_type_code").value;
  var supplierID = $("supplier_id").value;
  var productName = $("product_name").value;
  var productPrice = $("product_price").value;
  var otherProducts = $("other_product_details").value;


  if (document.getElementById('product_id') != null) {
    console.log("ID EXISTS");
    // if the product exists we use a diffrent post parameters with a ID included
    var product_id = $("product_id").value;
    var postParameters = "do=" + action + "product_id=" + product_id + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + otherProducts;

  }
  else {
    console.log("Deosnt exists");
    var postParameters = "do=" + action + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + otherProducts;

  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
    }
  };
  console.log(action);
  // contains te post values
  xhttp.open("POST", "ctrl.database.php?do=createProduct", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function status(status) {
  $("status").innterHTML = status.responseText;
}
function showResult(result) {
  // To display the outcome of a request
  $("content").innerHTML = result.responseText;
}
