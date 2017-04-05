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
      <div class="col-4">
        <input type="text" id="search" placeholder="Zoek op: productnaam en details"><button type="button" onclick="searchItem(search);">Zoeken</button>
      </div>
      <div class="col-6"></div>
      <div class="col-8"></div>
      <button type="button" class="col-2" onclick="deleteSelected();">Verwijder</button>
      <button class='col-2 fa fa-plus-circle' onclick=getRequest('createFormForProduct'); type='button'>Create product</button>
      <div id="content">
      </div>
      <div class="col-4" id="pages">
      </div>
      <div class="col-8">&nbsp;</div>
      <div class="col-7"></div>

      <button type="button" class="col-2 fa fa-external-link"><a target="_blank" href="ctrl.database.php?do=csv&tableName=Products">CSV</a></button>
      <input type="month" class="col-2" id="datePicker" /><button class="col-1" type="button" onclick="searchByDate(datePicker);">Zoek</button>
    </div>
  </body>
</html>
