<?php
include 'config.php';
session_start();
$UID = $_GET['id'];
if(!isset($_SESSION['userName'])){
  header("location:../index.php");
}

$student_id = $_GET["id"];
$student = "SELECT * FROM students_list";
$result = mysqli_query($mysqli,$student);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<!--Jhana Marie-->
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PVCS | History</title>
  <link rel="shortcut icon" type="image/x-icon" href="../pvcs.png" />
  <!--toastr-->
  <link href="css/toastr-master/toastr.css" rel="stylesheet" type="text/css" />

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<style type="text/css">
  #dataTable_length{
    display: none !important;
  }
</style>

<body id="page-top" onload="load_data()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php?id=<?php echo $UID?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-id-card-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">S O A P V C S<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Information
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="home.php?id=<?php echo $UID?>">
          <i style="font-size:40px;" class="fas fa-fw fa-users"></i>
          <span style="font-size:15px;font-weight:bolder"> SOA</span>
        </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Divider -->

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userName'];?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

           
          </div>


          <!-- Content Row -->
<!------------------------------------------------------------------------------------->
          <!-- Modal for adding student -->
          <div class="modal fade" id="addPVCSstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add new Student</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <label><b>Student Information:</b></label>
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label for="exampleInputEmail1">Student ID:</label>
                        <input type="text" class="form-control" id="student_id" aria-describedby="emailHelp" placeholder="">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">First Name:</label>
                        <input type="text" class="form-control" id="fname" aria-describedby="emailHelp" placeholder="Enter First name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Last Name:</label>
                        <input type="text" class="form-control" id="lname" aria-describedby="emailHelp" placeholder="Enter Last name">
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="Status">Status:</label>
                        <select type="text" class="form-control" id="status">
                          <option disabled selected>Status</option>
                          <option>Regular</option>
                          <option>Online Class</option>
                          <option>Online Distance Learning</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Level:</label>
                        <select onchange="yrLevel()" type="email" class="form-control" id="level">
                          <option disabled selected>Year Level</option>
                          <option>PS</option>
                          <option>PR</option>
                          <option>K</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11-GAS</option>
                          <option>11-ABM</option>
                          <option>12</option>
                        </select>
                      </div>
                    </div>
                    <label><b>Payment Information:</b></label>
                    <div class="row">
                      <div class="form-group col-md-12" id="payment_info">

                      </div>
                    </div>

                    <label><b>Discount:</b></label>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label for="Status">ESC:</label>
                        <select type="email"class="form-control" id="ESC">
                          <option selected>0</option>
                          <option>11000</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="Status">Voucher:</label>
                        <select type="email"class="form-control" id="voucher">
                          <option selected>0</option>
                          <option>16000</option>
                          <option>20000</option>
                        </select>
                      </div>
                    </div>

                    <label><b>Special Discount:</b></label>
                    <div class="row">
                      <div class="form-group col-md-4">
                        <label for="Status">Honor Student:</label>
                        <select class="form-control" id="h_student">
                          <option selected>None</option>
                          <option>Gold</option>
                          <option>Silver</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Status">Sibling:</label>
                        <select class="form-control" id="sibling">
                          <option disabled selected>None</option>
                          <option>Yes</option>
                          <option>No</option>
                        </select>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="Status">Payment Method:</label>
                        <select onchange="pay()" class="form-control" id="payment">
                          <option>Cash</option>
                          <option>Installment</option>
                        </select>
                      </div>
                    </div>

                    <div id="payInfo" class="row" style="display: none">
                    <table class="table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <td align=""><label for="Status">Down Payment:</label>
                        <input onclick="amount()" type="number" class="form-control text-right" value="0" id="downPayment" aria-describedby="emailHelp" placeholder="Amount"></td>
                          <td align=""><label for="Status">Learning Module:</label>
                        <input type="number" class="form-control text-right" value="0" id="payModule" aria-describedby="emailHelp" placeholder="Amount"></td>
                        </tr>
                      </thead>
                    </table>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-12">
                      <a href="#" onclick="eval()" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-calculator"></i>
                      </span>
                      <span class="text">Evaluate</span></a>
                    </div>
                    </div>
                      <label><b>Discounts:</b></label>
                      <div class="row">
                      <div class="form-group col-md-12" id="totalPayment">

                      </div>
                    </div>
                  </form>
                                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <a href="#" onclick="addStudent()" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Save</span></a>
                </div>
              </div>
            </div>
          </div>
          <!--payment stats-->
          <script type="text/javascript">
            function pay(){
              var payM = $("#payment").val();
              if(payM == "Cash"){
                var payInfo = document.getElementById('payInfo');
                $("#downPayment").val("0");
                payInfo.style.display = "none";
              }else{
                var payInfo = document.getElementById('payInfo');
                payInfo.style.display = "block";
                $("#downPayment").val("12000");
              }
            }
            function amount(){
              $("#downPayment").val("");
            }
          </script>
          <script type="text/javascript">
            function yrLevel(){
              var yrLevel = $("#level").val();

                $.ajax({
                url: "fetchPaymentInfo.php",
                method: "POST",
                data:{"yrLevel":yrLevel},
                success:function(data){
                  $("#payment_info").html(data);
                }
              })
            }
          </script>
          <script type="text/javascript">
            function eval(){
              var ESC = $("#ESC").val();
              var voucher = $("#voucher").val();
              var h_student = $("#h_student").val();
              var sibling = $("#sibling").val();
              var yrLevel = $("#level").val();
              var payment = $("#payment").val();
              var downPayment = $("#downPayment").val();
              var payModule = $("#payModule").val();
              
              
              if (h_student == "Gold"){
                h_student = 0.9;
              }else if (h_student == "Silver"){
                h_student = 0.95;
              }else{
                h_student = 1;
              }
              if (sibling == "Yes"){
                sibling = 0.95;
              }else{
                sibling = 1;
              }
              if (payment == "Cash"){
                payment = 0.95;
              }else {
                payment = 1;
              }

              var totalDiscount = parseFloat(ESC) + parseFloat(voucher);
              //alert(sibling);
              $.ajax({
                url: "gettotal.php",
                method: "post",
                data:{"totalDiscount":totalDiscount,"h_student":h_student,"sibling":sibling,"yrLevel":yrLevel,"downPayment":downPayment,"payment":payment,"payModule":payModule},
                success:function(data){
                  //alert(data);
                  $("#totalPayment").html(data);
                }
              })
            }
          </script>
<!------------------------------------------------------------------------------------------->


          <!--modal for viweing-->
          <div class="modal fade" id="viewstudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="img/header.png" style="margin-left:4%;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <input type="" id="stud_id" name="" hidden>
                    <div id="student_info">
                    
                    </div>
                  </form>
                                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <a href="#" onclick="addPayment()" class="btn btn-success btn-icon-split">
                  <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                  </span>
                  <span class="text">Add Payment</span></a>
                </div>
              </div>
            </div>
          </div>
          <!--end modal viewing-->

          <!--button for adding new and old studnet-->
          <div class="row">
            <div class="form-group col-md-12">
              <h1 class="h3 mb-2 text-gray-800">Statement of Account</h1>
              <div class="float-right">
          
              </div>
            </div>
          </div>
          <!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary pull-right">Student's List</h6>
            </div>

            <div class="card-body">
            <div class="table-responsive">
            <div id="student_data">
            </div>
            </div>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>NOOR &copy; PVCS 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php?logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
<input type="hidden" id="student_id_ex" value="<?php echo $student_id ?>" name="">
  <!--Fetching data from database-->
<script type="text/javascript">
    function load_data()
    {
      var student_id = $("#student_id_ex").val();
      $.ajax({
        url: "fetchHistory.php",
        method: "POST",
        data: {"student_id":student_id},
        success:function(data){
          $("#student_data").html(data); 
          //alert(data);
        }
      }) 
    } 
</script>


<!--view student info-->
<script type="text/javascript">
  function view(button){
    var num_rec = button.id;
    //alert(student_id);

    $.ajax({
      url: "fetchstudent_history.php",
      method: "POST",
      data:{"num_rec":num_rec},
      success:function(data){
      $("#student_info").html(data);
      $('#stud_id').val(student_id);
      $("#viewstudent").modal("show");
      }
    })
  }
  function addPayment(){
    var student_id = $('#stud_id').val();
    //alert(student_id);
    window.location.href = "addPayment.php?id="+student_id;
  }
</script>
<!--end student info-->

<!--add new studene-->
<script type="text/javascript">
  function addStudent(){
    //alert("hi");
    var student_id = $("#student_id").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var status = $("#status").val();
    var level = $("#level").val();
    var ESC = $("#ESC").val();
    var voucher = $("#voucher").val();
    var payment_m = $("#payment").val();
    var payModule = $("#payModule").val();
    var downPayment = $("#downPayment").val();

    

    var h_student = document.getElementById("h_student_p").innerHTML;
    var sibling = document.getElementById("sibling_p").innerHTML;
    var subtotal = document.getElementById("Subtotal").value;
    var total = document.getElementById("new_total_value").value;
    var monthly = document.getElementById("monthly").value;

    //alert(total);
    if(payment_m =="Installment"){
          $.ajax({
          url: "addNewStudent_paymentInfo.php",
          method: "POST",
          data:{"student_id":student_id,"fname":fname,"lname":lname,"status":status,"level":level,"ESC":ESC,"voucher":voucher,"h_student":h_student,"sibling":sibling,"payment_m":payment_m,"downPayment":downPayment,"subtotal":subtotal,"total":total,"monthly":monthly,"payModule":payModule},
            success:function(data){
            alert(data);
            window.location="addNew.php";
          }
        })
      }else{
          $.ajax({
          url: "addNewStudent_paymentInfo_cash.php",
          method: "POST",
          data:{"student_id":student_id,"fname":fname,"lname":lname,"status":status,"level":level,"ESC":ESC,"voucher":voucher,"h_student":h_student,"sibling":sibling,"payment_m":payment_m,"subtotal":subtotal,"total":total},
            success:function(data){
            
            $("#addPVCSstudent").modal("hide");
            swal("Successfully Added!", "Student successfully recorded", "success");
            load_data();

          }
        })
      }
    
  }
</script>




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


  <!--toastr-->
  <script src="css/toastr-master/toastr.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>
