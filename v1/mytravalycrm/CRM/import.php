

<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script type="text/javascript">
     function Upload() {
         var fileUpload = document.getElementById("fileUpload");
         var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
         if (regex.test(fileUpload.value.toLowerCase())) {
             if (typeof (FileReader) != "undefined") {
                 var reader = new FileReader();
                 reader.onload = function (e) {
                     var table = document.createElement("table");
                     table.setAttribute("class", "border_class");

                     var rows = e.target.result.split("\n");
                     for (var i = 0; i < rows.length; i++) {
                         var cells = rows[i].split(",");
                         
                         if (cells.length > 1) {
                             var row = table.insertRow(-1);
                             row.setAttribute("class","row_class");
                              for (var j = 0; j < cells.length; j++) {
                                 var cell = row.insertCell(-1);
                                 cell.setAttribute("class", "cell_class");
                                 cell.innerHTML = cells[j];
                             }
                         }
                     }
                     var dvCSV = document.getElementById("dvCSV");
                     dvCSV.innerHTML = "";
                     dvCSV.appendChild(table);
                 }
                 reader.readAsText(fileUpload.files[0]);
             } else {
                 alert("This browser does not support HTML5.");
             }
         } else {
             alert("Please upload a valid CSV file.");
         }
     }
  </script>
   <style type="text/css">
   .border_class {
                  border: 2px solid #FF6F61;
                  width: 100%;

       }
    .row_class,.cell_class{
      border: 1px solid #FF6F61;

    }
    .row_class{
      width: 100%;
    }
    .cell_class{
      column-width: 100px;
    }
  </style>
</head>
<body>
    <div class="container-fluid">
    <?php include("header.php"); ?>

     <!--end of  header section -->

     <br><br>
     
     <div class="row">
        <!-- Sidebar section -->
        <div class="col-xl-2"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!-- end of Sidebar section -->
        <div class="col-md-10">
            <div class="container">
      <form enctype="multipart/form-data" method="post" role="form" action="csv_code.php">
          <input type="file" name="file"  id="fileUpload" required="" />
          <input type="button" class="btn btn-primary" id="upload" value="Upload" onclick="Upload()" />
          <button type="submit" class="btn btn-primary" name="submit" value="Save" align-center>Save</button>
          <div class="text-danger">
            Download the sample data from here: 
          <a href="sample.xlsx"  download>Sample Data</a>
        </div><hr />
          <div id="dvCSV"></div>
      </form>
    </div>
</div>
</div>
</div>

</body>
</html>