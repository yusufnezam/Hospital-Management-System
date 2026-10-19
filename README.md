# Hospital Management System

A PHP and MySQL web application for managing patient appointments, prescriptions, hospital staff, wards, beds, and patient admissions.

**Author:** Yusuf Nezam

## Features

- **Patient portal:** Patient registration and login, appointment booking, appointment history, prescription viewing, and PDF bill generation.
- **Doctor portal:** View appointments, search for patients by contact number, and create and review prescriptions.
- **Admin/receptionist portal:** View and manage patient and doctor records, appointments, prescriptions, and contact messages; add or remove doctors.
- **Ward and bed management:** Create, view, edit, and delete wards; add and remove beds; track availability; admit registered patients to beds; discharge patients; and view bed statistics.
- **Contact page:** Collects visitor messages for the administrator.

## Design

The refreshed public, login, and ward-management pages use a green and teal palette, including `#27ae60`, `#16a085`, and `#1abc9c`, with white and light neutral backgrounds. Some older patient, doctor, and admin dashboard pages still use blue accents, so the theme is not yet completely uniform across the application.

## Technology

- PHP and MySQL/MariaDB
- Apache, commonly provided by XAMPP
- HTML, CSS, JavaScript, and Bootstrap
- jQuery and Font Awesome
- TCPDF for PDF output

## Run Locally

1. Install XAMPP (or another local Apache, PHP, and MySQL/MariaDB environment).
2. Clone or copy this repository into the web server's document root, such as `C:\\xampp\\htdocs` on Windows.
3. Start Apache and MySQL from the XAMPP control panel.
4. Create a database named `myhmsdb` in phpMyAdmin.
5. Import [`myhmsdb.sql`](myhmsdb.sql) into that database.
6. Check [`include/config.php`](include/config.php) and set the database host, username, password, and database name for your local environment.
7. Open `http://localhost/Hospital-Management-System/` in a browser (adjust the URL if you used a different folder name).

The project loads Bootstrap and Google Fonts from external CDNs, so an internet connection is needed for those externally hosted assets. TCPDF is included in the repository for PDF generation.

## Main Files

| Path | Purpose |
| --- | --- |
| `index.php` | Public hospital homepage |
| `index1.php` | Login and registration portal |
| `admin-panel.php` | Patient dashboard |
| `doctor-panel.php` | Doctor dashboard |
| `admin-panel1.php` | Admin/receptionist dashboard |
| `ward-management.php` | Ward, bed, admission, and discharge interface |
| `ward_functions.php` | Ward and bed database operations |
| `include/config.php` | Database connection configuration |
| `myhmsdb.sql` | Database schema and sample records |
| `WARD_MANAGEMENT_GUIDE.md` | Ward and bed management details |
| `PROJECT_OVERVIEW.md` | Additional project overview |

## Database

The SQL dump creates the core patient (`patreg`), doctor (`doctb`), administrator (`admintb`), appointment (`appointmenttb`), prescription (`prestb`), and contact (`contact`) tables. Ward management adds `wardtb` and `bedtb`, with bed records linked to wards and, when occupied, registered patients. The dump includes sample data; the totals and occupancy shown by the application depend on the current database contents.

## Security Notice

This is a legacy/demo application and is not ready for production use without security work. The included sample database contains default credentials, passwords are stored as plain text, and some database operations interpolate request values directly into SQL. Use only in a local test environment until authentication, password hashing, input handling, and database queries have been secured. Change or remove sample credentials before exposing the application to a network.

## Demo

[Video demo](https://www.youtube.com/watch?v=W2XGSM5i9P8) (may not show the latest ward-management or theme updates).