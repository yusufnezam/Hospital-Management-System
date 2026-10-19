# 🏥 Global Hospital Management System - Project Overview

## 📊 System Architecture

Your Hospital Management System is a **web-based application** built with PHP, MySQL, and Bootstrap. It manages patients, doctors, appointments, prescriptions, and now beds & wards.

---

## 🎯 Main Features

### 1. **🏠 Homepage (index.php)**
- **Purpose**: Public landing page showcasing hospital services
- **Features**:
  - Hero section with hospital mission statement
  - About section with hospital information
  - Services overview
  - Contact information
  - Navigation to login page

### 2. **🔐 Login Portal (index1.php)**
- **Purpose**: Central authentication hub with 4 user roles
- **User Types**:
  1. **👤 Patient** - Register/login for appointments and medical records
  2. **👨‍⚕️ Doctor** - Login to manage patients and prescriptions
  3. **👔 Admin/Receptionist** - Manage hospital operations
  4. **🏥 Ward Management** - Manage beds and patient admissions

---

## 💾 Database Structure (myhmsdb)

### **Main Tables:**

#### 1. **patreg** - Patient Registration
```
pid (Patient ID) | fname | lname | gender | email | contact | password
Example: (4, 'Kishan', 'Lal', 'Male', 'kishan@gmail.com', '8838489464', 'kishan123')
```

#### 2. **doctb** - Doctor Credentials
```
username | password | email | spec (specialty) | docFees
Example: ('Dinesh', 'dinesh123', 'dinesh@gmail.com', 'General', 700)
```

#### 3. **admintb** - Admin/Receptionist Credentials
```
username | password
Example: ('admin', 'admin123')
```

#### 4. **appointmenttb** - Appointments
```
pid | ID | fname | lname | appdate | apptime | doctor | docFees | userStatus | doctorStatus
Status: 0=pending, 1=approved
```

#### 5. **prestb** - Prescriptions
```
doctor | pid | ID | fname | lname | appdate | disease | allergy | prescription
```

#### 6. **wardtb** - Ward Information ⭐ NEW
```
ward_id | ward_name | ward_type | capacity | description
4 Wards: ICU (10 beds), General (30 beds), Pediatric (20 beds), Cardiology (15 beds)
```

#### 7. **bedtb** - Bed Management ⭐ NEW
```
bed_id | ward_id | bed_number | bed_status | patient_id | admission_date | discharge_date
10 Beds total: 3 occupied, 7 available
```

---

## 🔄 User Workflows

### **Patient Workflow:**
```
1. Register (index1.php) → Register new account
2. Login (index1.php) → Enter credentials
3. View Dashboard (index.php) → See appointments & medical history
4. Book Appointment → Select doctor & time
5. View Prescriptions → Download medical reports
6. Make Payments (optional)
```

### **Doctor Workflow:**
```
1. Login (index1.php - Doctor tab) → Enter credentials
2. View Pending Appointments (doctor-panel.php)
3. Approve/Reject Appointments
4. View Patient Details
5. Write Prescriptions
6. Track Patient Progress
```

### **Admin/Receptionist Workflow:**
```
1. Login (index1.php - Admin tab) → Enter credentials
2. View Dashboard (admin-panel1.php)
3. Manage Patients & Doctors
4. Create Appointments on behalf of patients
5. Manage Beds & Wards
6. View Reports & Statistics
```

### **Ward Management Workflow:** ⭐ NEW
```
1. Login (index1.php - Ward Management tab)
2. Access Dashboard (ward-management.php)
3. Tab 1 - Ward Management:
   - View all wards with statistics
   - Add new wards
   - Edit/Delete wards
4. Tab 2 - Bed Management:
   - Add beds to wards
   - View bed availability
   - Delete beds
5. Tab 3 - Occupied Beds:
   - See currently admitted patients
   - Admit new patients to beds
   - Discharge patients
6. View real-time statistics:
   - Total beds, available beds, occupied beds
```

---

## 📁 Important Files & Functions

### **Core Files:**

| File | Purpose |
|------|---------|
| `index.php` | 🏠 Homepage with hospital info |
| `index1.php` | 🔐 Login portal for all users |
| `func.php` | 🔧 Patient authentication & functions |
| `func1.php` | 🔧 Doctor authentication & functions |
| `func3.php` | 🔧 Admin/Ward login handler |
| `header.php` | 🔗 Session initialization & DB connection |
| `include/config.php` | 🗄️ Database configuration |
| `include/checklogin.php` | 🔒 Session validation |

### **User Panels:**

| File | Access Level | Purpose |
|------|--------------|---------|
| `admin-panel.php` | Admin | Patient & doctor management |
| `admin-panel1.php` | Admin | System settings & ward link |
| `doctor-panel.php` | Doctor | Appointment management |
| `ward-management.php` | Admin | 🏥 Bed & ward operations |

### **Ward Management Functions (ward_functions.php):**

```php
// Ward Operations
addWard()                  // Create new ward
getAllWards()             // List all wards
getWardById()             // Fetch specific ward
updateWard()              // Edit ward details
deleteWard()              // Remove ward
getWardStats()            // Get ward statistics

// Bed Operations
addBed()                  // Add bed to ward
getAllBeds()              // List all beds
getBedsByWard()           // Beds in specific ward
admitPatient()            // Admit patient to bed
dischargePatient()        // Remove patient from bed
updateBedStatus()         // Change bed status
deleteBed()               // Remove bed

// Reports
getAvailableBeds()        // Count free beds
getOccupiedBeds()         // Count occupied beds
getTotalBedsStatistics()  // Summary statistics
getPatientBedInfo()       // Patient's current bed info
```

---

## 🎨 UI/UX Features

### **Color Scheme:**
- **Primary Green**: #27ae60 (Healthcare, trust, growth)
- **Secondary Teal**: #1abc9c, #16a085 (Professional, clean)
- **White**: #ffffff (Clean, minimal)
- **Light Green**: #f1f8f6 (Soft backgrounds)
- **Green Borders**: #c8e6c9 (Accent lines)

### **Navigation:**
All pages feature a consistent navbar:
```
🏥 GLOBAL HOSPITALS [HOME] [ABOUT] [CONTACT] [LOGIN]
```

### **Design Elements:**
- ✅ Gradient backgrounds
- ✅ Rounded corners (modern look)
- ✅ Hover animations (interactive feel)
- ✅ Shadow effects (depth)
- ✅ Responsive layout (mobile-friendly)

---

## 🔐 Security Features

1. **Session-based Authentication**
   - User sessions stored in `$_SESSION`
   - Auto-logout on browser close
   - Redirects unauthorized users to login

2. **Password Validation**
   - Minimum 6 characters
   - Confirmation matching
   - Stored in database (plain text - can be improved)

3. **Role-based Access Control**
   - Different panels for different roles
   - Session checks on every protected page
   - Credentials validated against specific tables

---

## 🚀 How to Access Each Role

### **Test Credentials:**

**Admin/Receptionist:**
```
Username: admin
Password: admin123
```

**Doctors (examples):**
```
Username: Dinesh     | Password: dinesh123
Username: Ganesh     | Password: ganesh123
Username: Amit       | Password: amit123
```

**Patients (examples):**
```
Username: kishan@gmail.com | Password: kishan123
Username: alia@gmail.com   | Password: alia123
Username: william@gmail.com| Password: william123
```

---

## 📊 Ward & Bed Management Details

### **Database Seeded Data:**

**Wards:**
```
1. ICU Ward (Intensive Care) - 10 beds
2. General Ward - 30 beds
3. Pediatric Ward - 20 beds
4. Cardiology Ward - 15 beds
```

**Beds Status:**
```
OCCUPIED (3):
- ICU-001: Patient ID 4 (Kishan Lal)
- GEN-001: Patient ID 2 (Alia Bhatt)
- PED-001: Patient ID 11 (Shraddha Kapoor)
- CAR-002: Patient ID 9 (William Blake)

AVAILABLE (6):
- ICU-002, ICU-003
- GEN-002, GEN-003
- PED-002
- CAR-001
```

### **Ward Dashboard Statistics:**
- **Total Beds**: 10 (shown in stats box)
- **Available**: 7 (free beds)
- **Occupied**: 3 (patient beds)
- **Total Wards**: 4

---

## 🛠️ Technology Stack

| Layer | Technology |
|-------|-----------|
| **Frontend** | HTML5, CSS3, Bootstrap 4, JavaScript |
| **Backend** | PHP 7.2+ |
| **Database** | MySQL (MariaDB 10.1.31) |
| **Server** | Apache (XAMPP) |
| **Libraries** | jQuery, Font Awesome, Google Fonts |
| **PDF Generation** | TCPDF |

---

## 📋 File Structure

```
Hospital-Management-System/
├── index.php                 (Homepage)
├── index1.php                (Login portal)
├── contact.html              (Contact form)
├── services.html             (About page)
├── admin-panel.php           (Admin dashboard)
├── admin-panel1.php          (Admin settings)
├── doctor-panel.php          (Doctor interface)
├── ward-management.php       (🏥 Bed/Ward operations)
├── func.php                  (Patient functions)
├── func1.php                 (Doctor functions)
├── func3.php                 (Admin functions)
├── ward_functions.php        (🏥 Ward/Bed functions)
├── include/
│   ├── config.php            (DB config)
│   ├── header.php            (Session init)
│   ├── checklogin.php        (Auth check)
│   └── footer.php
├── css/                      (Bootstrap, custom styles)
├── js/                       (jQuery, custom scripts)
├── vendor/                   (Composer packages)
├── TCPDF/                    (PDF library)
├── myhmsdb.sql              (Database backup)
└── style1.css/style2.css    (Theming)
```

---

## 🔄 Patient Admission Process

### **Step-by-Step in Ward Management:**

1. **Go to Tab 3: Occupied Beds** in ward-management.php
2. **Select a bed** from the "Admit New Patient" form
3. **Select patient** from registered patients dropdown
4. **Set admission date**
5. **Click "Admit Patient"**
6. **Result**: Bed status changes from "Available" → "Occupied"
7. **Patient info** displays in the occupied beds table
8. **To discharge**: Click "Discharge" button in the table
9. **Bed status** changes back to "Available"

---

## ✨ Recent Updates (Green & White Theme)

- ✅ Homepage (index.php) - Green background & styling
- ✅ Login portal (index1.php) - Green gradient theme
- ✅ Ward dashboard (ward-management.php) - Green professional theme
- ✅ Contact page (contact.html) - Green background & button styling
- ✅ About page (services.html) - Green navbar
- ✅ All navbars - Consistent green (#27ae60 → #1abc9c) gradient

---

## 🎯 Key Statistics (Current Data)

- **Total Patients**: 11
- **Total Doctors**: 8
- **Total Appointments**: 13
- **Wards**: 4
- **Total Beds**: 10
- **Occupied Beds**: 4
- **Available Beds**: 6

---

## 🚀 To Run the Project

1. **Install XAMPP** with Apache & MySQL
2. **Copy project** to `htdocs` folder
3. **Create database** named `myhmsdb`
4. **Import** `myhmsdb.sql` to populate tables
5. **Start Apache & MySQL** in XAMPP
6. **Open browser** and go to `localhost/Hospital-Management-System`
7. **Login** with test credentials

---

## 📝 Notes

- All database queries are in MySQL/PHP format
- Bootstrap 4 handles responsive design
- Session-based auth (no JWT/tokens)
- Real-time statistics on dashboards
- Color-coded bed status (Available/Occupied)
- Professional healthcare branding with "Global Hospitals"

---

**Created**: 2026-09-01  
**System**: Hospital Management System v2.0 with Ward Management  
**Status**: ✅ Fully Functional with Green & White Theme
