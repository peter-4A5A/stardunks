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
  var productType = checkValueExists("product_type_code");
  var supplierID = checkValueExists("supplier_id");
  var productName = checkValueExists("product_name");
  var productPrice = checkValueExists("product_price");
  var other_products_details = checkValueExists("other_products_details");
  console.log(other_products_details);


  if (document.getElementById('product_id') != null) {
    console.log("ID EXISTS");
    // if the product exists we use a diffrent post parameters with a ID included
    var product_id = $("product_id").value;
    var postParameters = "do=" + action + "&product_id=" + product_id + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + other_products_details;
  }
  else {
    console.log("Deosnt exists");
    var postParameters = "do=" + action + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + other_products_details;

  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
     alert("Updated");
     getRequest("getTable");
    }
  };
  console.log(postParameters);
  // contains te post values
  xhttp.open("POST", "ctrl.database.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function checkValueExists(element) {
  // This function check if the value has a value
  // If it doen't have one we set "" as value
  element = $(element);
  if (element.value != null) {
    return(element.value);
  }
  else {
    return("NULL");
  }
}
function status(status) {
  $("status").innterHTML = status.responseText;
}
function showResult(result) {
  // To display the outcome of a request
  $("content").innerHTML = result.responseText;
}
