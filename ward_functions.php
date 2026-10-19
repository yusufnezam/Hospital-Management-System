<?php
include_once('include/config.php');

// ==================== WARD FUNCTIONS ====================

function addWard($ward_name, $ward_type, $capacity, $description) {
    global $con;
    $query = "INSERT INTO wardtb (ward_name, ward_type, capacity, description) 
              VALUES ('$ward_name', '$ward_type', '$capacity', '$description')";
    $result = mysqli_query($con, $query);
    return $result;
}

function getAllWards() {
    global $con;
    $query = "SELECT * FROM wardtb";
    $result = mysqli_query($con, $query);
    return $result;
}

function getWardById($ward_id) {
    global $con;
    $query = "SELECT * FROM wardtb WHERE ward_id = '$ward_id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result);
}

function updateWard($ward_id, $ward_name, $ward_type, $capacity, $description) {
    global $con;
    $query = "UPDATE wardtb SET ward_name='$ward_name', ward_type='$ward_type', 
              capacity='$capacity', description='$description' WHERE ward_id='$ward_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function deleteWard($ward_id) {
    global $con;
    $query = "DELETE FROM wardtb WHERE ward_id='$ward_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function getWardStats($ward_id) {
    global $con;
    $query = "SELECT 
              (SELECT COUNT(*) FROM bedtb WHERE ward_id='$ward_id') as total_beds,
              (SELECT COUNT(*) FROM bedtb WHERE ward_id='$ward_id' AND bed_status='Available') as available_beds,
              (SELECT COUNT(*) FROM bedtb WHERE ward_id='$ward_id' AND bed_status='Occupied') as occupied_beds
              FROM wardtb WHERE ward_id='$ward_id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result);
}

// ==================== BED FUNCTIONS ====================

function addBed($ward_id, $bed_number) {
    global $con;
    $query = "INSERT INTO bedtb (ward_id, bed_number, bed_status) 
              VALUES ('$ward_id', '$bed_number', 'Available')";
    $result = mysqli_query($con, $query);
    return $result;
}

function getAllBeds() {
    global $con;
    $query = "SELECT b.*, w.ward_name, p.fname, p.lname FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id 
              LEFT JOIN patreg p ON b.patient_id = p.pid
              ORDER BY w.ward_id, b.bed_number";
    $result = mysqli_query($con, $query);
    return $result;
}

function getBedsByWard($ward_id) {
    global $con;
    $query = "SELECT b.*, w.ward_name, p.fname, p.lname FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id 
              LEFT JOIN patreg p ON b.patient_id = p.pid
              WHERE b.ward_id = '$ward_id'
              ORDER BY b.bed_number";
    $result = mysqli_query($con, $query);
    return $result;
}

function getBedById($bed_id) {
    global $con;
    $query = "SELECT b.*, w.ward_name, p.fname, p.lname FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id 
              LEFT JOIN patreg p ON b.patient_id = p.pid
              WHERE b.bed_id = '$bed_id'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result);
}

function admitPatient($bed_id, $patient_id, $admission_date) {
    global $con;
    $query = "UPDATE bedtb SET bed_status='Occupied', patient_id='$patient_id', 
              admission_date='$admission_date' WHERE bed_id='$bed_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function dischargePatient($bed_id, $discharge_date) {
    global $con;
    $query = "UPDATE bedtb SET bed_status='Available', patient_id=NULL, 
              admission_date=NULL, discharge_date='$discharge_date' WHERE bed_id='$bed_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function updateBedStatus($bed_id, $status) {
    global $con;
    $query = "UPDATE bedtb SET bed_status='$status' WHERE bed_id='$bed_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function deleteBed($bed_id) {
    global $con;
    $query = "DELETE FROM bedtb WHERE bed_id='$bed_id'";
    $result = mysqli_query($con, $query);
    return $result;
}

function getAvailableBeds() {
    global $con;
    $query = "SELECT b.*, w.ward_name FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id
              WHERE b.bed_status='Available'
              ORDER BY w.ward_id, b.bed_number";
    $result = mysqli_query($con, $query);
    return $result;
}

function getOccupiedBeds() {
    global $con;
    $query = "SELECT b.*, w.ward_name, p.fname, p.lname, p.email, p.contact FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id
              LEFT JOIN patreg p ON b.patient_id = p.pid
              WHERE b.bed_status='Occupied'
              ORDER BY w.ward_id, b.bed_number";
    $result = mysqli_query($con, $query);
    return $result;
}

function getTotalBedsStatistics() {
    global $con;
    $query = "SELECT 
              (SELECT COUNT(*) FROM bedtb) as total_beds,
              (SELECT COUNT(*) FROM bedtb WHERE bed_status='Available') as available_beds,
              (SELECT COUNT(*) FROM bedtb WHERE bed_status='Occupied') as occupied_beds,
              (SELECT COUNT(*) FROM wardtb) as total_wards";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result);
}

function getPatientBedInfo($patient_id) {
    global $con;
    $query = "SELECT b.*, w.ward_name FROM bedtb b 
              LEFT JOIN wardtb w ON b.ward_id = w.ward_id
              WHERE b.patient_id='$patient_id' AND b.bed_status='Occupied'";
    $result = mysqli_query($con, $query);
    return mysqli_fetch_array($result);
}

?>
