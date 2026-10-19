<!DOCTYPE html>
<?php 
session_start();
include_once('include/config.php');
include('ward_functions.php');

// Check if user is logged in
if(!isset($_SESSION['username'])){
  header("Location: index1.php");
  exit();
}

// Handle Ward Operations
if(isset($_POST['add_ward']))
{
  $ward_name = $_POST['ward_name'];
  $ward_type = $_POST['ward_type'];
  $capacity = $_POST['capacity'];
  $description = $_POST['description'];
  
  $result = addWard($ward_name, $ward_type, $capacity, $description);
  if($result)
    echo "<script>alert('Ward added successfully!');</script>";
  else
    echo "<script>alert('Error adding ward!');</script>";
}

if(isset($_POST['update_ward']))
{
  $ward_id = $_POST['ward_id'];
  $ward_name = $_POST['ward_name'];
  $ward_type = $_POST['ward_type'];
  $capacity = $_POST['capacity'];
  $description = $_POST['description'];
  
  $result = updateWard($ward_id, $ward_name, $ward_type, $capacity, $description);
  if($result)
    echo "<script>alert('Ward updated successfully!');</script>";
  else
    echo "<script>alert('Error updating ward!');</script>";
}

if(isset($_POST['delete_ward']))
{
  $ward_id = $_POST['ward_id'];
  $result = deleteWard($ward_id);
  if($result)
    echo "<script>alert('Ward deleted successfully!');</script>";
  else
    echo "<script>alert('Error deleting ward!');</script>";
}

// Handle Bed Operations
if(isset($_POST['add_bed']))
{
  $ward_id = $_POST['ward_id'];
  $bed_number = $_POST['bed_number'];
  
  $result = addBed($ward_id, $bed_number);
  if($result)
    echo "<script>alert('Bed added successfully!');</script>";
  else
    echo "<script>alert('Error adding bed!');</script>";
}

if(isset($_POST['admit_patient']))
{
  $bed_id = $_POST['bed_id'];
  $patient_id = $_POST['patient_id'];
  $admission_date = $_POST['admission_date'];
  
  $result = admitPatient($bed_id, $patient_id, $admission_date);
  if($result)
    echo "<script>alert('Patient admitted successfully!');</script>";
  else
    echo "<script>alert('Error admitting patient!');</script>";
}

if(isset($_POST['discharge_patient']))
{
  $bed_id = $_POST['bed_id'];
  $discharge_date = $_POST['discharge_date'];
  
  $result = dischargePatient($bed_id, $discharge_date);
  if($result)
    echo "<script>alert('Patient discharged successfully!');</script>";
  else
    echo "<script>alert('Error discharging patient!');</script>";
}

if(isset($_POST['delete_bed']))
{
  $bed_id = $_POST['bed_id'];
  $result = deleteBed($bed_id);
  if($result)
    echo "<script>alert('Bed deleted successfully!');</script>";
  else
    echo "<script>alert('Error deleting bed!');</script>";
}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    
    <style>
      * {
        font-family: 'IBM Plex Sans', sans-serif;
      }
      
      body {
        background-color: #f8f9fa;
      }
      
      .bg-primary {
        background: linear-gradient(135deg, #27ae60 0%, #16a085 100%) !important;
      }
      
      .nav-link {
        color: #fff !important;
        margin-right: 15px;
        font-weight: 500;
      }
      
      .nav-link:hover {
        color: #d4f1d4 !important;
        text-decoration: underline;
      }
      
      .navbar-brand {
        font-weight: 700;
        font-size: 1.3rem;
      }
      
      .card {
        box-shadow: 0 4px 12px rgba(39, 174, 96, 0.15);
        margin-bottom: 20px;
        border: 1px solid #e8f5e9;
        border-radius: 10px;
      }
      
      .card-header {
        background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
        color: white;
        font-weight: 600;
        border-bottom: none;
        border-radius: 9px 9px 0 0;
      }
      
      .btn-primary {
        background-color: #27ae60;
        border-color: #27ae60;
        font-weight: 500;
        transition: all 0.3s ease;
      }
      
      .btn-primary:hover {
        background-color: #1e8449;
        border-color: #1e8449;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(39, 174, 96, 0.3);
      }
      
      .stat-box {
        background: linear-gradient(135deg, #27ae60 0%, #1abc9c 100%);
        color: white;
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        margin-bottom: 15px;
        box-shadow: 0 6px 15px rgba(39, 174, 96, 0.2);
        transition: transform 0.3s ease;
      }
      
      .stat-box:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(39, 174, 96, 0.3);
      }
      
      .stat-box h3 {
        margin: 0;
        font-size: 2.8rem;
        font-weight: bold;
      }
      
      .stat-box p {
        margin: 8px 0 0 0;
        font-size: 1rem;
        font-weight: 500;
      }
      
      .nav-tabs {
        border-bottom: 2px solid #e8f5e9;
      }
      
      .nav-tabs .nav-link {
        color: #555;
        border: none;
        border-bottom: 3px solid transparent;
        transition: all 0.3s ease;
      }
      
      .nav-tabs .nav-link:hover {
        color: #27ae60;
        border-bottom-color: #27ae60;
      }
      
      .nav-tabs .nav-link.active {
        color: #27ae60;
        background-color: transparent;
        border-bottom-color: #27ae60;
        font-weight: 600;
      }
      
      table.table-striped tbody tr:hover {
        background-color: #e8f5e9;
      }
      
      table thead {
        background-color: #f1f8f6;
      }
      
      .badge-success {
        background-color: #27ae60;
      }
      
      .badge-danger {
        background-color: #e74c3c;
      }
      
      .badge-warning {
        background-color: #f39c12;
        color: white;
      }
      
      .form-control {
        border: 1px solid #c8e6c9;
        border-radius: 6px;
        transition: all 0.3s ease;
      }
      
      .form-control:focus {
        border-color: #27ae60;
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
      }
      
      .modal-header {
        background: linear-gradient(135deg, #27ae60 0%, #229954 100%);
        color: white;
      }
      
      .modal-header .close {
        color: white;
      }
      
      .btn-info {
        background-color: #16a085;
        border-color: #16a085;
      }
      
      .btn-info:hover {
        background-color: #117a65;
        border-color: #117a65;
      }
      
      .btn-success {
        background-color: #27ae60;
        border-color: #27ae60;
      }
      
      .btn-success:hover {
        background-color: #1e8449;
        border-color: #1e8449;
      }
    </style>

    <title>Ward & Bed Management - Hospital Management System</title>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <a class="navbar-brand" href="#"><i class="fa fa-hospital-o" aria-hidden="true"></i> Global Hospital - Ward Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="admin-panel1.php"><i class="fa fa-arrow-left"></i> Back to Admin Panel</a></li>
          <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid" style="margin-top: 100px; padding: 20px;">
      
      <!-- Statistics Section -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="stat-box">
            <h3><?php 
              $stats = getTotalBedsStatistics();
              echo $stats['total_beds']; 
            ?></h3>
            <p>Total Beds</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <h3><?php echo $stats['available_beds']; ?></h3>
            <p>Available Beds</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <h3><?php echo $stats['occupied_beds']; ?></h3>
            <p>Occupied Beds</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stat-box" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <h3><?php echo $stats['total_wards']; ?></h3>
            <p>Total Wards</p>
          </div>
        </div>
      </div>

      <!-- Tabs for Navigation -->
      <ul class="nav nav-tabs" id="managerTabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="wards-tab" data-toggle="tab" href="#wards" role="tab">Ward Management</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="beds-tab" data-toggle="tab" href="#beds" role="tab">Bed Management</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="occupied-tab" data-toggle="tab" href="#occupied" role="tab">Occupied Beds</a>
        </li>
      </ul>

      <div class="tab-content" id="managerTabsContent">
        
        <!-- WARD MANAGEMENT TAB -->
        <div class="tab-pane fade show active" id="wards" role="tabpanel">
          <div class="row mt-4">
            <!-- Add Ward Form -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5>Add New Ward</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="form-group">
                      <label>Ward Name</label>
                      <input type="text" class="form-control" name="ward_name" required>
                    </div>
                    <div class="form-group">
                      <label>Ward Type</label>
                      <input type="text" class="form-control" name="ward_type" placeholder="e.g., ICU, General, Pediatric" required>
                    </div>
                    <div class="form-group">
                      <label>Capacity</label>
                      <input type="number" class="form-control" name="capacity" min="1" required>
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="description" rows="3"></textarea>
                    </div>
                    <button type="submit" name="add_ward" class="btn btn-primary btn-block">Add Ward</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Wards List -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5>Existing Wards</h5>
                </div>
                <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>Ward Name</th>
                        <th>Type</th>
                        <th>Capacity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $wards = getAllWards();
                        while($ward = mysqli_fetch_array($wards)) {
                          $stats = getWardStats($ward['ward_id']);
                      ?>
                      <tr>
                        <td><?php echo $ward['ward_name']; ?></td>
                        <td><?php echo $ward['ward_type']; ?></td>
                        <td><?php echo $stats['available_beds']."/".$ward['capacity']; ?></td>
                        <td>
                          <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editWardModal<?php echo $ward['ward_id']; ?>">Edit</button>
                          <form method="POST" style="display:inline;">
                            <input type="hidden" name="ward_id" value="<?php echo $ward['ward_id']; ?>">
                            <button type="submit" name="delete_ward" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                          </form>
                        </td>
                      </tr>

                      <!-- Edit Ward Modal -->
                      <div class="modal fade" id="editWardModal<?php echo $ward['ward_id']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Ward</h5>
                              <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                              </button>
                            </div>
                            <form method="POST">
                              <div class="modal-body">
                                <input type="hidden" name="ward_id" value="<?php echo $ward['ward_id']; ?>">
                                <div class="form-group">
                                  <label>Ward Name</label>
                                  <input type="text" class="form-control" name="ward_name" value="<?php echo $ward['ward_name']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label>Ward Type</label>
                                  <input type="text" class="form-control" name="ward_type" value="<?php echo $ward['ward_type']; ?>" required>
                                </div>
                                <div class="form-group">
                                  <label>Capacity</label>
                                  <input type="number" class="form-control" name="capacity" value="<?php echo $ward['capacity']; ?>" min="1" required>
                                </div>
                                <div class="form-group">
                                  <label>Description</label>
                                  <textarea class="form-control" name="description" rows="3"><?php echo $ward['description']; ?></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="update_ward" class="btn btn-primary">Update Ward</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- BED MANAGEMENT TAB -->
        <div class="tab-pane fade" id="beds" role="tabpanel">
          <div class="row mt-4">
            <!-- Add Bed Form -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5>Add New Bed</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="form-group">
                      <label>Select Ward</label>
                      <select class="form-control" name="ward_id" required>
                        <option value="">-- Select Ward --</option>
                        <?php
                          $wards = getAllWards();
                          while($ward = mysqli_fetch_array($wards)) {
                        ?>
                        <option value="<?php echo $ward['ward_id']; ?>"><?php echo $ward['ward_name']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Bed Number</label>
                      <input type="text" class="form-control" name="bed_number" placeholder="e.g., ICU-001" required>
                    </div>
                    <button type="submit" name="add_bed" class="btn btn-primary btn-block">Add Bed</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- Beds List -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h5>All Beds</h5>
                </div>
                <div class="card-body" style="max-height: 600px; overflow-y: auto;">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th>Ward</th>
                        <th>Bed No.</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $beds = getAllBeds();
                        while($bed = mysqli_fetch_array($beds)) {
                      ?>
                      <tr>
                        <td><?php echo $bed['ward_name']; ?></td>
                        <td><?php echo $bed['bed_number']; ?></td>
                        <td>
                          <?php 
                            if($bed['bed_status'] == 'Available')
                              echo '<span class="badge badge-success">Available</span>';
                            else
                              echo '<span class="badge badge-danger">Occupied</span>';
                          ?>
                        </td>
                        <td>
                          <form method="POST" style="display:inline;">
                            <input type="hidden" name="bed_id" value="<?php echo $bed['bed_id']; ?>">
                            <button type="submit" name="delete_bed" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                          </form>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- OCCUPIED BEDS TAB -->
        <div class="tab-pane fade" id="occupied" role="tabpanel">
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Occupied Beds & Patient Management</h5>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                      <tr>
                        <th>Bed Number</th>
                        <th>Ward</th>
                        <th>Patient Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Admission Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $occupied = getOccupiedBeds();
                        if(mysqli_num_rows($occupied) > 0) {
                          while($bed = mysqli_fetch_array($occupied)) {
                      ?>
                      <tr>
                        <td><strong><?php echo $bed['bed_number']; ?></strong></td>
                        <td><?php echo $bed['ward_name']; ?></td>
                        <td><?php echo $bed['fname']." ".$bed['lname']; ?></td>
                        <td><?php echo $bed['contact']; ?></td>
                        <td><?php echo $bed['email']; ?></td>
                        <td><?php echo $bed['admission_date']; ?></td>
                        <td>
                          <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#dischargeModal<?php echo $bed['bed_id']; ?>">Discharge</button>
                        </td>
                      </tr>

                      <!-- Discharge Modal -->
                      <div class="modal fade" id="dischargeModal<?php echo $bed['bed_id']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Discharge Patient</h5>
                              <button type="button" class="close" data-dismiss="modal">
                                <span>&times;</span>
                              </button>
                            </div>
                            <form method="POST">
                              <div class="modal-body">
                                <input type="hidden" name="bed_id" value="<?php echo $bed['bed_id']; ?>">
                                <p><strong>Patient: </strong><?php echo $bed['fname']." ".$bed['lname']; ?></p>
                                <p><strong>Bed: </strong><?php echo $bed['bed_number']; ?></p>
                                <div class="form-group">
                                  <label>Discharge Date</label>
                                  <input type="date" class="form-control" name="discharge_date" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" name="discharge_patient" class="btn btn-danger">Discharge Patient</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <?php 
                          }
                        } else {
                          echo '<tr><td colspan="7" class="text-center">No occupied beds</td></tr>';
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!-- Admit Patient Section -->
            <div class="col-md-12 mt-4">
              <div class="card">
                <div class="card-header">
                  <h5>Admit Patient to Available Bed</h5>
                </div>
                <div class="card-body">
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Available Bed</label>
                          <select class="form-control" name="bed_id" id="bedSelect" required>
                            <option value="">-- Select Bed --</option>
                            <?php
                              $available = getAvailableBeds();
                              while($bed = mysqli_fetch_array($available)) {
                            ?>
                            <option value="<?php echo $bed['bed_id']; ?>"><?php echo $bed['bed_number']." - ".$bed['ward_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Select Patient</label>
                          <select class="form-control" name="patient_id" required>
                            <option value="">-- Select Patient --</option>
                            <?php
                              $query = "SELECT * FROM patreg";
                              $patients = mysqli_query($con, $query);
                              while($patient = mysqli_fetch_array($patients)) {
                            ?>
                            <option value="<?php echo $patient['pid']; ?>"><?php echo $patient['fname']." ".$patient['lname']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Admission Date</label>
                          <input type="date" class="form-control" name="admission_date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <button type="submit" name="admit_patient" class="btn btn-success btn-block">Admit Patient</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  </body>
</html>
