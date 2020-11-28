
  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<?php
include 'connect.php';

$student_id = $_POST['student_id'];

$query = "SELECT * FROM monthly_payment_history WHERE student_id = '$student_id'";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th>Student ID</th>
	  		<th>Name</th>
	  		<th>Year Level</th>
        <th>Month of</th>
        <th>Statement as of</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
    $dateString = $row["statement_as_of"];
    $statement_as_of_date = date("M d Y", strtotime($dateString));
    		$output .= '
			<tr>
				<td>'.$row["student_id"].'</td>
				<td>'.$row["student_name"].'</td>
				<td>'.$row["level"].'</td>
        <td>'.$row["for_the_month"].'</td>
        <td>'.$statement_as_of_date.'</td>
				<td align="right">

			

                <a href="#" onclick="view(this)" class="btn btn-primary btn-icon-split" id="'.$row["num_rec"].'">
                  <span class="icon text-white-50">
                    <i class="fas fa-eye"></i>
                  </span>
                <span class="text">View</span></a>
			</tr>
		';
	}
}
else
{
	$output .='
	<tr>
		<td colspan="4" align="center">Data not found</td>
	</tr>
	';
}

$output .='
</tbody>
<tfoot>
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Year Level</th>
<th>Month of</th>
<th>Statement as of</th>
<th>Action</th>
</tr>
<tfoot>
</table>
';

echo $output;
?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>





