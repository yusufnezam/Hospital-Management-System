# Beds & Ward Management System - Feature Guide

## Overview
A comprehensive bed and ward management module for the Hospital Management System that allows admins to manage hospital wards, beds, and patient admissions/discharges.

## Features

### 1. **Ward Management**
- **Add Ward**: Create new hospital wards with details
  - Ward Name (e.g., ICU Ward, General Ward, Pediatric Ward)
  - Ward Type (e.g., ICU, General, Pediatric, Cardiology)
  - Capacity (total number of beds)
  - Description

- **View Wards**: See all wards with available/occupied beds status
- **Edit Ward**: Update ward information
- **Delete Ward**: Remove wards from the system
- **Ward Statistics**: View total, available, and occupied beds per ward

### 2. **Bed Management**
- **Add Bed**: Create new beds in a specific ward
  - Select ward
  - Assign bed number (e.g., ICU-001, GEN-002)
  - Automatic status set to "Available"

- **View All Beds**: See complete bed inventory with status
- **Delete Bed**: Remove beds from the system
- **Bed Status Tracking**: 
  - Available (empty beds)
  - Occupied (with patient information)

### 3. **Patient Admission**
- **Admit Patient to Bed**:
  - Select available bed
  - Choose patient from registered patients
  - Set admission date
  - Automatic status update to "Occupied"

- **View Occupied Beds**: See all currently occupied beds with patient details
  - Patient name
  - Contact information
  - Email
  - Admission date

### 4. **Patient Discharge**
- **Discharge Patient**:
  - Select occupied bed
  - Set discharge date
  - Automatic status change to "Available"
  - Bed becomes available for new admissions

### 5. **Dashboard Statistics**
Quick overview showing:
- Total beds in hospital
- Available beds
- Occupied beds
- Total wards

## How to Access

### From Admin Panel
1. Login as admin
2. Click on **"Ward & Bed Management"** in the sidebar menu
3. Or click the Ward & Beds card in the dashboard

### Direct URL
Navigate to: `http://yoursite.com/ward-management.php`

## Database Tables

### `wardtb` Table
```
- ward_id (INT, PRIMARY KEY, AUTO_INCREMENT)
- ward_name (VARCHAR 50)
- ward_type (VARCHAR 50)
- capacity (INT)
- description (VARCHAR 250)
- created_date (TIMESTAMP)
```

### `bedtb` Table
```
- bed_id (INT, PRIMARY KEY, AUTO_INCREMENT)
- ward_id (INT, FOREIGN KEY)
- bed_number (VARCHAR 20)
- bed_status (VARCHAR 20) - "Available" or "Occupied"
- patient_id (INT, FOREIGN KEY - nullable)
- admission_date (DATE)
- discharge_date (DATE)
- created_date (TIMESTAMP)
```

## Functions Available

Located in: `ward_functions.php`

### Ward Functions
- `addWard($ward_name, $ward_type, $capacity, $description)` - Add new ward
- `getAllWards()` - Get all wards
- `getWardById($ward_id)` - Get specific ward details
- `updateWard($ward_id, $ward_name, $ward_type, $capacity, $description)` - Update ward
- `deleteWard($ward_id)` - Delete ward
- `getWardStats($ward_id)` - Get bed statistics for a ward

### Bed Functions
- `addBed($ward_id, $bed_number)` - Add new bed
- `getAllBeds()` - Get all beds with ward and patient info
- `getBedsByWard($ward_id)` - Get beds in specific ward
- `getBedById($bed_id)` - Get specific bed details
- `admitPatient($bed_id, $patient_id, $admission_date)` - Admit patient to bed
- `dischargePatient($bed_id, $discharge_date)` - Discharge patient from bed
- `updateBedStatus($bed_id, $status)` - Update bed status
- `deleteBed($bed_id)` - Delete bed
- `getAvailableBeds()` - Get all available beds
- `getOccupiedBeds()` - Get all occupied beds with patient info
- `getTotalBedsStatistics()` - Get overall statistics
- `getPatientBedInfo($patient_id)` - Get bed info for specific patient

## Step-by-Step Usage Guide

### Adding a Ward
1. Go to Ward Management → Ward Management tab
2. Click "Add New Ward" section
3. Fill in:
   - Ward Name
   - Ward Type
   - Capacity
   - Description (optional)
4. Click "Add Ward"

### Adding Beds
1. Go to Ward Management → Bed Management tab
2. Click "Add New Bed" section
3. Select Ward from dropdown
4. Enter Bed Number (e.g., ICU-001)
5. Click "Add Bed"

### Admitting a Patient
1. Go to Ward Management → Occupied Beds tab
2. Scroll to "Admit Patient to Available Bed" section
3. Select:
   - Available Bed
   - Patient
   - Admission Date
4. Click "Admit Patient"

### Discharging a Patient
1. Go to Ward Management → Occupied Beds tab
2. View "Occupied Beds & Patient Management" table
3. Click "Discharge" button for the patient
4. Set discharge date
5. Click "Discharge Patient"

## Sample Data Included
Pre-configured wards:
- ICU Ward (capacity: 10)
- General Ward (capacity: 30)
- Pediatric Ward (capacity: 20)
- Cardiology Ward (capacity: 15)

Sample beds (10 beds total) with some occupied

## Security Notes
- All operations require admin login
- Input validation recommended (SQL injection prevention)
- Consider adding role-based access control
- Log all bed management operations

## Future Enhancements
- Bed transfer between wards
- Patient medical history tracking in beds
- Room/bed customization (single/double occupancy)
- Billing integration
- Bed maintenance scheduling
- Real-time bed availability notifications
- Emergency bed allocation
- Discharge summary generation
- Insurance information management

## Files Modified/Created
1. **myhmsdb.sql** - Updated with wardtb and bedtb tables
2. **ward_functions.php** - NEW - All CRUD functions
3. **ward-management.php** - NEW - Admin interface
4. **admin-panel1.php** - Updated with navigation link
