<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
<!-- To Display CSV File -->
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
  </head>
  <body>
    <div class="container">
      <form enctype="multipart/form-data" method="post" role="form" action="csv_code.php">
          <input type="file" name="file"  id="fileUpload" />
          <input type="button" class="btn btn-primary" id="upload" value="Upload" onclick="Upload()" />
          <button type="submit" class="btn btn-primary" name="submit" value="Save" align-center>Save</button>
          <div class="text-danger">
            Download the sample data from here: 
          <a href="sample.xlsx"  download>Sample Data</a>
        </div><hr />
          <div id="dvCSV"></div>
      </form>
    </div>
  </body>
</html>
