function getRequest(request) {
  // Request all the info for every user
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("content").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ctrl.database.php?do=" + request, true);
  xhttp.send();
}
