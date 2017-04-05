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
function searchItem(searchValue) {
  // Search a item
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     $("content").innerHTML = this.responseText;
    }
  };
  searchValue = searchValue.value
  xhttp.open("GET", "ctrl.database.php?do=search&searchValue=" + searchValue, true);
  xhttp.send();
}
function $(id) {
  // To select a div
  var element = document.getElementById(id);
  return(element);
}
function deleteData(id) {
  // Delete a item
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
    //  getRequest("getTable");
    //  getPages();
     console.log(id);
    }
  };
  xhttp.open("GET", "ctrl.database.php?do=delete&id=" + id, true);
  xhttp.send();
}
function postAction(action) {
  // Action contains on what we gonne do update or delete of create data
  var productType = checkValueExists("product_type_code");
  var supplierID = checkValueExists("supplier_id");
  var productName = checkValueExists("product_name");
  var productPrice = checkValueExists("product_price");
  var other_products_details = checkValueExists("other_products_details");

  if (document.getElementById('product_id') != null) {
    // if the product exists we use a diffrent post parameters with a ID included
    var product_id = $("product_id").value;
    var postParameters = "do=" + action + "&product_id=" + product_id + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + other_products_details;
  }
  else {
    var postParameters = "do=" + action + "&product_type_code=" + productType + "&supplier_id=" + supplierID + "&product_name=" + productName + "&product_price=" + productPrice + "&other_products_details=" + other_products_details;

  }

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //  showResult(this);
     alert("Updated");
     GoToPage("0");
    }
  };
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
function getPages() {
  // This function gets the pages
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     $("pages").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ctrl.database.php?do=page", true);
  xhttp.send();
}

var currentPage = 0;
// Saves on which page we are now
function GoToPage(pageNumber, max) {
  // Max contains the maximum of pages we have
  // This if because of the next function that it wont go past his pages
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      currentPage = pageNumber;
      getPages();
     showResult(this);
    }
  };
  if (pageNumber == "next") {
    // If we want to go to the next page
    // We change the page number
    // To the currentpage + 1
    currentPage++;
    if (currentPage == max || currentPage > max) {
      // We do nothing
      // Thats why we lower the currentpage
      pageNumber = currentPage - 1;
    }
    else {
      pageNumber = currentPage;
    }
  }
  xhttp.open("GET", "ctrl.database.php?do=getPage&pageNumber=" + pageNumber, true);
  xhttp.send();
}
function searchByDate(date) {
  date = date.value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this);
    }
  };
  xhttp.open("GET", "ctrl.database.php?do=searchDate&date=" + date, true);
  xhttp.send();
}
function status(status) {
  $("status").innterHTML = status.responseText;
}
function showResult(result) {
  // To display the outcome of a request
  $("content").innerHTML = result.responseText;
}
