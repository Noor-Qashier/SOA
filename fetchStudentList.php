  <!--toastr-->
<link href="css/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php
include 'connect.php';

$query = "SELECT * FROM students_list";

$statement = $mysqli->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	  <thead>
	  	<tr>
	  		<th >Student ID</th>
	  		<th >Name</th>
	  		<th >Year Level</th>
	  		<th>Action</th>
	  	</tr>
	  </thead>
	  <tbody>
';
if($total_row > 0)
{
	foreach ($result as $row) 
	{
		$output .= '
			<tr>
				<td>'.$row["student_id"].'</td>
				<td>'.$row["firstname"]." ".$row["lastname"].'</td>
				<td>'.$row["year_level"].'</td>
				<td align="right">
				<a href="addPayment.php?id='.$row["student_id"].'" onclick="addPayment()" class="btn btn-info btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                  </span>
                <span class="text">Add Payment</span></a>

                <a href="#" onclick="view(this)" class="btn btn-primary btn-icon-split" id="'.$row["student_id"].'">
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
<th >Student ID</th>
<th >Name</th>
<th >Year Level</th>
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

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>