<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Load More Pagination</title>
  <link rel="stylesheet" href="css/style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div id="main" class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-5 center">
          <div id="table-data">
            <div class="table-responsive">
              <table id="loadData" class="table table-bordered">
                <tr>
                  <th class="text-center">ID</th>
                  <th>Abbreviation</th>
                  <th>Country Name</th>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      // Load Data from Database with Ajax
      function loadTable(page) {
        $.ajax({
          url: "ajax-pagination.php",
          type: "POST",
          data: {
            page_no: page
          },
          success: function(data) {
            if (data) {
              $("#pagination").remove();
              $("#loadData").append(data);
            } else {
              $("#ajaxbtn").hide();
              $("#ajaxbtn").prop("disabled", true);
            }

          }
        });
      }
      loadTable();
      // Add Click Event on ajaxbtn
      $(document).on("click", "#ajaxbtn", function() {
        $("#ajaxbtn").html("Loading...");
        var pid = $(this).data("id");
        loadTable(pid);
      });

    });
  </script>

</body>

</html>