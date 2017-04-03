<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">

  <link rel="stylesheet" href="style/grid.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="main.js"></script>

  </head>
  <body onload='getRequest("getTable"); getPages();'>
    <div class="row">
      <div class="col-4">
        <input type="text" id="search" oninput="searchItem(this);"><button type="button" onclick="searchItem(this);">Zoeken</button>
      </div>
      <div id="content">
      </div>
      <div id="pages">
      </div>
    </div>
  </body>
</html>
