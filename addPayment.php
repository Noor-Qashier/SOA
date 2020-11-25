<?php
include 'config.php';
$student_id = $_GET["id"];
$student = "SELECT * FROM student_payment_information WHERE student_id = '$student_id'";
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

  <title>SB Admin 2 - Tables</title>
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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-id-card-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">S O A P V C S<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i style="font-size:40px;" class="fas fa-fw fa-home"></i>
          <span style="font-size:15px;">HOME</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Information
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="addNew.php">
          <i style="font-size:40px;" class="fas fa-fw fa-users"></i>
          <span style="font-size:15px;font-weight:bolder"> STUDENTS</span>
        </a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        More Info
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="paid.html">
          <i style="font-size:40px;" class="fas fa-fw fa-file-invoice-dollar"></i>
          <span style="font-size:15px;font-weight:bolder">PAID</span>
        </a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i style="font-size:40px;" class="fas fa-fw fa-coins"></i>
          <span style="font-size:15px;font-weight:bolder">BALANCE</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i style="font-size:40px;" class="fas fa-fw fa-hand-holding-usd"></i>
          <span style="font-size:15px;font-weight:bolder">FULL</span></a>
      </li> 

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
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

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <!-- Content Row -->

      
      <div class="row">
      <form class="col-8">
          <div class="form-group">
          <h4 style="text-align:center;background-color:#EAECEE;padding-top:20px;padding-bottom:20px;"><b>STATEMENT OF ACCOUNT</b><br><small>
            <select style="color:gray;border-color:transparent;background-color:transparent;" id="for_the_month">
              <option>January</option>
              <option>February</option>
              <option>March</option>
              <option>April</option>
              <option>May</option>
              <option>June</option>
              <option>July</option>
              <option>August</option>
              <option>September</option>
              <option>October</option>
              <option>November</option>
              <option>December</option>
            </select></small></h4>
          </div>
          <div class="form-group">
          <h4 id="name" style="text-transform: uppercase; font-weight:bold;"><?php echo $row["fname"]." ".$row["lname"] ?></h4>
              <h6>SCHOOL ID: <?php echo $row["student_id"].' | Level: '.$row["level"] ?></h6>
              <input id="stud_id" value="<?php echo $row["student_id"]?>" type="" name="" hidden/>
              <input id="stud_name" value="<?php echo $row["student_id"].' | Level: '.$row["level"] ?>" type="" name="" hidden/>
          </div>

          <div class="form-inline" style="float: right;">
                  <label for="as_of"><b>STATEMENT AS OF:</b></label> 
                  <input id="as_of" style=";background-color: transparent; margin-left: 10px;margin-bottom: 10px;" class="form-control" type="date" name=""></td>
          </div>

          <div class="form-group">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th colspan="3" >PAST DUE ACCOUNT</th>
                  <td id="total_past_due" width="150" contenteditable="true" align="right"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="3" >CURRENT DUE ACCOUNT:</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tuition fee/Learning Module:</td>
                  <td id="" width="150" align="right">&#8369; <?php echo number_format($row["monthly"],2)?></td>
                  <input type="hidden" id="tuition_fee_cd" value="<?php echo $row["monthly"]?>">
                </tr>
                <tr>
                  <td>Remediation/Tutorial:</td>
                  <td id="tutorial_cd" width="150" contenteditable="true" align="right"></td>
                </tr>
                <tr>
                  <td>Surcharge due to Late Payment:</td>
                  <td id="" width="150" align="right"><select id="surcharge_cd" style="text-align: right;" class="form-control">
                    <option>0.00</option>
                    <option>100.00</option>
                  </select></td>
                </tr>
                <tr>
                  <td id="other_description" contenteditable="true">Others: </td>
                  <td id="others_amount" width="150" contenteditable="true" align="right"></td>
                </tr>
                <tr>
                  <td align="right"><b>Total Current Due:</b></td>
                  <td style="cursor: pointer; font-weight:bold;background-color: #9FE2BF;" onclick="totalCurrentDues()" id="total_current_dues" width="300" align="right"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="150">DUE ON:</th>
                  <th><input id="due_on" style="border:0;background-color: transparent;" class="form-control" type="date" name=""></th>
                  <td width="300" align="right"><b>Total Due:</b></td>
                  <td style="cursor: pointer; font-weight:bold" onclick="totalDues(this)" id="total_due" width="300" align="right"></td>
                </tr>
              </thead>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="150">PAYMENTS:</th>
                  <th width="70"> OR #</th>
                  <td id="or_number" width="205" contenteditable="true" align="right"></td>
                  <td align="right"><b>Amount Paid:</b></td>
                  <td style=" font-weight:bold" id="amount_paid" width="200" contenteditable="true" align="right"></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" align="right"><b>Balance After Payment:</b></td>
                  <td style="cursor: pointer; font-weight:bold;background-color: #40E0D0" onclick="totalDues(this)" id="balance_after_payment" width="150" align="right"></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <td style="background-color:#EAECEE;"><b>Note:</b> Please call us in case of any discrepancy. Surcharge of P100 is charged for payment after 15th of every month starting July 15. You could also deposit directly to our BPI Account No. 2141-8891-28.</td>
                </tr>
              </thead>
            </table>
          </div>
          <div class="form-group" align="right">
            <a href="addNew.php" type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Cancel</a href="addNew.php">
            <a href="#" onclick="savePayment()" class="btn btn-success btn-lg btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-save"></i>
            </span>
            <span class="text">Save</span></a>
          </div>
      </form>
            <!-- /.container-fluid -->

      <form class="col-4">
          <div class="form-group">
          <h4 style="text-align:center;background-color:#36b9cc;color:white;padding-top:20px;padding-bottom:20px;"><b>PAYMENT INFORMATION</b></h4>
          </div>

          <div class="form-group">
          <table class="table table-bordered" style="background-color:#36b9cc;color:white;" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="3" >PAYMENT:</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Tuition fees:</td>
                  <td id="tuition_fees" width="150" align="right">&#8369; <?php echo number_format($row["tuition_fees"],2)?></td>
                </tr>
                <tr>
                  <td>Other School Fees:</td>
                  <td id="other_school_fees" width="150" align="right">&#8369; <?php echo number_format($row["other_school_fees"],2)?></td>
                </tr>
                <tr>
                  <td>Learning Module:</td>
                  <td id="learning_module" width="150" align="right">&#8369; <?php echo number_format($row["learning_module"],2)?></td>
                </tr>
                <tr>
                  <td align="right"><b>Total:</b></td>
                  <td id="subtotal" width="276" align="right" style="cursor: pointer; font-weight:bold">&#8369; <?php echo number_format($row["subtotal"],2)?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="form-group">
          <table class="table table-bordered" style="background-color:#36b9cc;color:white;" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th colspan="3" >DISCOUNT:</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>ESC:</td>
                  <td id="ESC" width="150" align="right">&#8369; <?php echo number_format($row["ESC"],2)?></td>
                </tr>
                <tr>
                  <td>Voucher:</td>
                  <td id="voucher" width="150" align="right">&#8369; <?php echo number_format($row["voucher"],2)?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" style="background-color:#36b9cc;color:white;" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="background-color:#36b9cc;color:white;" colspan="4">SPECIAL DISCOUNT:</th>
                </tr>
                <tr>
                  <td>Honor Student:</td>
                  <td id="ESC" width="150" align="right"><?php echo $row["h_student"]?></td>
                </tr>
                <tr>
                  <td>Sibling:</td>
                  <td id="voucher" width="150" align="right"><?php echo $row["sibling"]?></td>
                </tr>
              </thead>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" style="background-color:#36b9cc;color:white;" id="dataTable" width="100%" cellspacing="0">
              <thead>
            
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" align="right"><b>DOWN PAYMENT:</b></td>
                  <td style="cursor: pointer; font-weight:bold" onclick="totalDues(this)" id="" width="150" align="right">&#8369; <?php echo number_format($row["downPayment"],2)?></td>
                </tr>
                <tr>
                  <td colspan="4" align="right"><b>LEARNING MODULE:</b></td>
                  <td style="cursor: pointer; font-weight:bold" onclick="totalDues(this)" id="" width="150" align="right">&#8369; <?php echo number_format($row["payModule"],2)?></td>
                </tr>
                <tr>
                  <td colspan="4" align="right"><b>MONTHLY:</b></td>
                  <td style="cursor: pointer; font-weight:bold" onclick="totalDues(this)" id="balance_after_payment" width="150" align="right">&#8369; <?php echo number_format($row["monthly"],2)?></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="form-group">
          <table class="table table-bordered" style="background-color:#36b9cc;color:white;" id="dataTable" width="100%" cellspacing="0">
              <thead>
            
              </thead>
              <tbody>
                <tr>
                  <td colspan="4" align="right"><b>GRAND TOTAL:</b></td>
                  <td style="cursor: pointer; font-weight:bold" onclick="totalDues(this)" id="balance_after_payment" width="150" align="right">&#8369; <?php echo number_format($row["total"],2)?></td>
                </tr>
              </tbody>
            </table>
          </div>
      </form>
    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



</script>
<!--save payment-->
<script type="text/javascript">
    function totalPastDues(){
    //alert("wadeaw");
    var tuition_fee_pd = $("#tuition_fee_pd").html();
    var books_pd = $("#books_pd").html();
    var others_pd = $("#others_pd").html();

    var totalPastDues = parseFloat(tuition_fee_pd)+parseFloat(books_pd)+parseFloat(others_pd);

    $("#total_past_dues").html(totalPastDues);
  }

    function totalCurrentDues(){
    var tuition_fee_cd = $("#tuition_fee_cd").val();
    var tutorial_cd = $("#tutorial_cd").html();
    var surcharge_cd = $("#surcharge_cd").val();
    var others_amount = $("#others_amount").html();
    


    if(tuition_fee_cd == ""){
      tuition_fee_cd = 0;
    }
    if(tutorial_cd == ""){
      tutorial_cd = 0;
    }
    if(surcharge_cd == 0){
      surcharge_cd = 0;
    }
    if(others_amount == 0){
      others_amount = 0;
    }
    var totalCurrentDues = parseFloat(tuition_fee_cd)+parseFloat(tutorial_cd)+parseFloat(surcharge_cd)+parseFloat(others_amount);
    //alert(surcharge_cd);
    $("#total_current_dues").html(totalCurrentDues);
    //alert(totalCurrentDues);
  }
    function totalDues() {
    var past_due = $("#total_past_due").html();
    var current_due = $("#total_current_dues").html();
    var amount_paid = $("#amount_paid").html();
    if(past_due == ""){
      past_due = 0;
    }
    if(current_due == ""){
      current_due = 0;
    }
    var total_dues = parseFloat(past_due)+parseFloat(current_due);

    var balance_after_payment = parseFloat(total_dues)-parseFloat(amount_paid);

    //alert(total_dues);
    $("#total_due").html(total_dues);
    $("#balance_after_payment").html(balance_after_payment);

    }
</script>
<script type="text/javascript">
  function savePayment(){
    var for_the_month = $("#for_the_month").val()
    var stud_id = $("#stud_id").val();
    var stud_name = $("#stud_name").val();
    var as_of = $("#as_of").val();
    var total_past_due = $("#total_past_due").html();
    var tuition_fee_cd = $("#tuition_fee_cd").val();
    var tutorial_cd = $("#tutorial_cd").html();
    var surcharge_cd = $("#surcharge_cd").val();
    var other_description = $("#other_description").html();
    var others_amount = $("#others_amount").html();
    var total_current_dues = $("#total_current_dues").html();
    var due_on = $("#due_on").html();
    var total_due = $("#total_due").html();
    var or_number = $("#or_number").html();
    var amount_paid = $("#amount_paid").html();
    var balance_after_payment = $("#balance_after_payment").html();

    alert(tutorial_cd);


    //alert(total_current_dues);
    $.ajax({
      url: "savePayment.php",
      method: "POST",
      data:{
        "for_the_month":for_the_month,
        "stud_id":stud_id,
        "stud_name":stud_name,
        "as_of":as_of,
        "total_past_due":total_past_due,
        "tuition_fee_cd":tuition_fee_cd,
        "tutorial_cd":tutorial_cd,
        "surcharge_cd":surcharge_cd,
        "other_description":other_description,
        "others_amount":others_amount,
        "total_current_dues":total_current_dues,
        "due_on":due_on,
        "total_due":total_due,
        "or_number":or_number,
        "amount_paid":amount_paid,
        "balance_after_payment":balance_after_payment},
      success:function(data){
        alert(data);
        //window.location="addNew.php";
      }
    })

  }
</script>
<!--end save payment-->

<!--view student info-->
<script type="text/javascript">
  function view(button){
    var student_id = button.id;
    //alert(student_id);

    $.ajax({
      url: "fetchstudent.php",
      method: "POST",
      data:{"student_id":student_id},
      success:function(data){
      $("#student_info").html(data);
      $("#viewstudent").modal("show");
      }
    })
  }
</script>
<!--end student info-->

<!--add new studene-->
<script type="text/javascript">
  function addStudent(){
    //alert("hi");
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var ylevel = $("#ylevel").val();
    $.ajax({
      url: "addNewStudent.php",
      method: "POST",
      data:{"fname":fname,"lname":lname,"ylevel":ylevel},
      success:function(data){
        alert(data);
        load_data();
        var fname = $("#fname").val("");
        var lname = $("#lname").val("");
        var ylevel = $("#ylevel").val("");
        $('#addPVCSstudent').modal('hide');

      }
    })
  }
</script>

<!--Fetching data from database-->
<script type="text/javascript">
    function load_data()
    {

       $.ajax({
        url: "fetchStudentList.php",
        method: "POST",
        success:function(data){
          $("#student_data").html(data);
          //alert(data);
        }
      }) 
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

</body>

</html>
