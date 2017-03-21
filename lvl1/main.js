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
function postRequest() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this.responseText);
     getRequest();
    }
    else {
      stateShow("loading");
    }
  };
  stateShow();
  var postParameters = "submit=update&first_name=" + firstname + "&last_name=" + secondname + "&user_city=" + usercity + "&user_id=" + id;
  // contains te post values
  xhttp.open("POST", "crtl.database.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
