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
  <link rel="stylesheet" href="style/style.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="main.js"></script>

  </head>
  <body onload='GoToPage("0"); getPages();'>
    <div class="row">
      <h1 class="col-12">Mange products</h1>
      <div class="col-4">
        <input type="text" id="search" class="col-4" placeholder="Zoek op: productnaam en details"><button type="button" class="col-1 fa fa-search roundButton" onclick="searchItem(search);"></button>
      </div>
      <div class="col-4"></div>
      <button type="button" class="col-2 fa fa-trash-o roundButton" onclick="deleteSelected();">Verwijder</button>
      <button class='col-2 fa fa-plus-circle roundButton' onclick=getRequest('createFormForProduct'); type='button'>Create product</button>

      <div id="content">
      </div>

      <div class="afterTable col-12">
        <div class="col-4" id="pages">
        </div>
        <div class="col-3"></div>
        <button type="button" class="col-2 fa fa-external-link roundButton"><a target="_blank" href="ctrl.database.php?do=csv&tableName=Products">CSV</a></button>
        <input type="month" class="col-2" id="datePicker" /><button class="col-1 fa fa-search" type="button" onclick="searchByDate(datePicker);"></button>
      </div>
    </div>
  </body>
</html>
