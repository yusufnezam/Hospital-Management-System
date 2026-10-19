#!/usr/bin/env python
# -*- coding: utf-8 -*-
"""
Hospital Management System - Presentation Generator
Creates a comprehensive PowerPoint presentation with use cases, ER diagram, and flowcharts
"""

from pptx import Presentation
from pptx.util import Inches, Pt
from pptx.enum.text import PP_ALIGN
from pptx.dml.color import RGBColor
import os

# Color scheme
PRIMARY_GREEN = RGBColor(39, 174, 96)      # #27ae60
SECONDARY_TEAL = RGBColor(26, 188, 156)    # #1abc9c
DARK_GREEN = RGBColor(22, 160, 133)        # #16a085
WHITE = RGBColor(255, 255, 255)
DARK_TEXT = RGBColor(51, 51, 51)
LIGHT_BG = RGBColor(241, 248, 246)

def add_title_slide(prs, title, subtitle=""):
    """Add a title slide"""
    slide = prs.slides.add_slide(prs.slide_layouts[6])  # Blank layout
    background = slide.background
    fill = background.fill
    fill.solid()
    fill.fore_color.rgb = PRIMARY_GREEN
    
    # Add title
    left = Inches(0.5)
    top = Inches(2.5)
    width = Inches(9)
    height = Inches(1.5)
    
    title_box = slide.shapes.add_textbox(left, top, width, height)
    title_frame = title_box.text_frame
    title_frame.word_wrap = True
    
    p = title_frame.paragraphs[0]
    p.text = title
    p.font.size = Pt(54)
    p.font.bold = True
    p.font.color.rgb = WHITE
    p.alignment = PP_ALIGN.CENTER
    
    if subtitle:
        left = Inches(0.5)
        top = Inches(4.2)
        width = Inches(9)
        height = Inches(1)
        
        subtitle_box = slide.shapes.add_textbox(left, top, width, height)
        subtitle_frame = subtitle_box.text_frame
        subtitle_frame.word_wrap = True
        
        p = subtitle_frame.paragraphs[0]
        p.text = subtitle
        p.font.size = Pt(28)
        p.font.color.rgb = LIGHT_BG
        p.alignment = PP_ALIGN.CENTER
    
    return slide

def add_content_slide(prs, title, content_list):
    """Add a content slide with bullet points"""
    slide = prs.slides.add_slide(prs.slide_layouts[6])  # Blank layout
    
    # Add title with green background
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    title_frame.clear()
    p = title_frame.paragraphs[0]
    p.text = title
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    p.alignment = PP_ALIGN.LEFT
    p.level = 0
    title_frame.margin_left = Inches(0.3)
    
    # Add content
    left = Inches(0.5)
    top = Inches(1.1)
    width = Inches(9)
    height = Inches(5.5)
    
    text_box = slide.shapes.add_textbox(left, top, width, height)
    text_frame = text_box.text_frame
    text_frame.word_wrap = True
    
    for idx, item in enumerate(content_list):
        if idx == 0:
            p = text_frame.paragraphs[0]
        else:
            p = text_frame.add_paragraph()
        
        p.text = item
        p.font.size = Pt(18)
        p.font.color.rgb = DARK_TEXT
        p.space_before = Pt(6)
        p.space_after = Pt(6)
        p.level = 0
        p.alignment = PP_ALIGN.LEFT
    
    return slide

def create_presentation():
    """Create the complete presentation"""
    prs = Presentation()
    prs.slide_width = Inches(10)
    prs.slide_height = Inches(7.5)
    
    # Slide 1: Title
    add_title_slide(prs, "GLOBAL HOSPITALS", "Hospital Management System\nPresentation")
    
    # Slide 2: Project Overview
    add_content_slide(prs, "📋 Project Overview", [
        "• Complete web-based Hospital Management System",
        "• Built with: PHP, MySQL, Bootstrap, jQuery",
        "• Supports 4 user roles: Patient, Doctor, Admin, Ward Manager",
        "• Features: Appointments, Prescriptions, Bed Management, Payments",
        "• Database: 11 Patients, 8 Doctors, 4 Wards, 10 Beds",
        "• Color Theme: Professional Green (#27ae60) & White"
    ])
    
    # Slide 3: Key Features
    add_content_slide(prs, "✨ Key Features", [
        "✅ Patient Management - Registration, Appointments, Records",
        "✅ Doctor Dashboard - Appointment Management, Prescriptions",
        "✅ Admin Panel - System Management, User Management",
        "✅ Ward Management - Bed Allocation, Patient Admission/Discharge",
        "✅ Appointment System - Booking, Approval, Tracking",
        "✅ Prescription System - Digital prescriptions, Medical history",
        "✅ Payment Processing - Billing and transaction management"
    ])
    
    # Slide 4: Use Cases - Patient
    add_content_slide(prs, "👤 Use Cases - Patient", [
        "1. Register New Account",
        "   • Enter personal details (Name, Email, Contact, Password)",
        "   • System validates and stores patient information",
        "",
        "2. Login to System",
        "   • Use registered email and password",
        "   • Access personalized patient dashboard",
        "",
        "3. Book Appointment",
        "   • Select Doctor and preferred date/time",
        "   • Payment and confirmation"
    ])
    
    # Slide 5: Use Cases - Doctor
    add_content_slide(prs, "👨‍⚕️ Use Cases - Doctor", [
        "1. Login to System",
        "   • Enter credentials to access doctor panel",
        "",
        "2. View Appointments",
        "   • See all pending appointments for the doctor",
        "   • View patient details and appointment history",
        "",
        "3. Manage Appointments",
        "   • Approve or reject patient appointments",
        "   • Set consultation time and fees",
        "",
        "4. Write Prescriptions",
        "   • Create digital prescriptions for patients",
        "   • Add disease details, allergies, and medications"
    ])
    
    # Slide 6: Use Cases - Admin/Receptionist
    add_content_slide(prs, "👔 Use Cases - Admin/Receptionist", [
        "1. Login to Admin Panel",
        "   • Access administration dashboard",
        "",
        "2. Manage Patients & Doctors",
        "   • View all registered patients and doctors",
        "   • Handle user verification",
        "",
        "3. Create Appointments",
        "   • Manually create appointments on behalf of patients",
        "   • Manage appointment schedule",
        "",
        "4. Generate Reports",
        "   • View appointment statistics",
        "   • Track system activities"
    ])
    
    # Slide 7: Use Cases - Ward Manager
    add_content_slide(prs, "🏥 Use Cases - Ward Manager", [
        "1. Login to Ward Management",
        "   • Access ward and bed management dashboard",
        "",
        "2. Manage Wards",
        "   • Add new wards (ICU, General, Pediatric, Cardiology)",
        "   • Set ward capacity and specifications",
        "",
        "3. Manage Beds",
        "   • Allocate beds to wards",
        "   • Track bed availability and status",
        "",
        "4. Admit/Discharge Patients",
        "   • Assign patients to available beds",
        "   • Record admission and discharge dates",
        "   • Update real-time bed statistics"
    ])
    
    # Slide 8: System Architecture
    add_content_slide(prs, "🏗️ System Architecture", [
        "┌─────────────────────────────────────────────┐",
        "│           PRESENTATION LAYER                │",
        "│  (HTML5, CSS3, Bootstrap, JavaScript)      │",
        "├─────────────────────────────────────────────┤",
        "│       BUSINESS LOGIC LAYER (PHP)            │",
        "│  (Authentication, Workflows, Processing)   │",
        "├─────────────────────────────────────────────┤",
        "│    DATA ACCESS LAYER (PHP + MySQL)          │",
        "│  (Database queries, CRUD operations)        │",
        "├─────────────────────────────────────────────┤",
        "│      DATABASE LAYER (MySQL - myhmsdb)       │",
        "│  (Patient, Doctor, Ward, Bed, Appointment) │",
        "└─────────────────────────────────────────────┘"
    ])
    
    # Slide 9: Database Tables - Part 1
    add_content_slide(prs, "🗄️ Database Schema - Part 1", [
        "📊 PATREG Table (Patients)",
        "├─ pid (Patient ID) | fname | lname | gender",
        "├─ email | contact | password | registration_date",
        "└─ Total: 11 registered patients",
        "",
        "📊 DOCTB Table (Doctors)",
        "├─ username | password | email | specialty",
        "├─ consultation_fees | experience | qualifications",
        "└─ Total: 8 registered doctors",
        "",
        "📊 ADMINTB Table (Staff)",
        "├─ username | password",
        "└─ Total: Admin/Receptionist credentials"
    ])
    
    # Slide 10: Database Tables - Part 2
    add_content_slide(prs, "🗄️ Database Schema - Part 2", [
        "📊 WARDTB Table (Wards) ⭐ NEW",
        "├─ ward_id | ward_name | ward_type | capacity",
        "├─ description | created_date",
        "└─ Total: 4 wards (ICU, General, Pediatric, Cardiology)",
        "",
        "📊 BEDTB Table (Beds) ⭐ NEW",
        "├─ bed_id | ward_id | bed_number | bed_status",
        "├─ patient_id | admission_date | discharge_date",
        "└─ Total: 10 beds (3 occupied, 7 available)",
        "",
        "📊 APPOINTMENTTB, PRESTB Tables (Medical Records)"
    ])
    
    # Slide 11: ER Diagram
    slide = prs.slides.add_slide(prs.slide_layouts[6])
    
    # Title
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    p = title_frame.paragraphs[0]
    p.text = "🔗 Entity Relationship Diagram (ER)"
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    title_frame.margin_left = Inches(0.3)
    
    # ER Diagram content
    er_text = """
    ┌──────────────┐              ┌──────────────┐              ┌──────────────┐
    │   PATREG     │              │    DOCTB     │              │   WARDTB     │
    ├──────────────┤              ├──────────────┤              ├──────────────┤
    │ pid (PK)     │              │ username(PK) │              │ward_id (PK)  │
    │ fname        │              │ password     │              │ward_name     │
    │ lname        │              │ email        │              │ward_type     │
    │ email        │              │ spec         │              │capacity      │
    │ contact      │              │ docFees      │              │description   │
    │ password     │              └──────────────┘              └──────────────┘
    └──────────────┘                      ▲                             ▲
           ▲                               │                             │
           │                          1-to-Many                      1-to-Many
           │                               │                             │
           │                    ┌──────────────────┐          ┌──────────────┐
           │                    │ APPOINTMENTTB    │          │   BEDTB      │
           │                    ├──────────────────┤          ├──────────────┤
           │                    │ ID (PK)          │          │bed_id (PK)   │
           │                    │ pid (FK)         │◄─────────│ward_id (FK)  │
           │                    │ doctor (FK)      │          │bed_number    │
           │                    │ appdate          │          │bed_status    │
           │                    │ userStatus       │          │patient_id(FK)│
           │                    │ doctorStatus     │◄─────────│admission_date│
           └────────────────────└──────────────────┘          └──────────────┘
                           │
                           │
                           ▼
                   ┌──────────────┐
                   │   PRESTB     │
                   ├──────────────┤
                   │ doctor (FK)  │
                   │ pid (FK)     │
                   │ ID (FK)      │
                   │ disease      │
                   │ prescription │
                   └──────────────┘
    """
    
    left = Inches(0.3)
    top = Inches(1.0)
    width = Inches(9.4)
    height = Inches(6.2)
    
    text_box = slide.shapes.add_textbox(left, top, width, height)
    text_frame = text_box.text_frame
    text_frame.word_wrap = True
    
    p = text_frame.paragraphs[0]
    p.text = er_text
    p.font.size = Pt(10)
    p.font.name = 'Courier New'
    p.font.color.rgb = DARK_TEXT
    
    # Slide 12: Patient Login Flowchart
    slide = prs.slides.add_slide(prs.slide_layouts[6])
    
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    p = title_frame.paragraphs[0]
    p.text = "🔄 Flowchart - Patient Login Process"
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    title_frame.margin_left = Inches(0.3)
    
    flowchart_text = """
                        START
                          │
                          ▼
                    ┌─────────────┐
                    │   OPEN       │
                    │ index1.php   │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │  SELECT      │
                    │ PATIENT TAB  │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │ ENTER EMAIL │
                    │ & PASSWORD  │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │ CLICK LOGIN │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐      YES      ┌──────────────┐
                    │  VALIDATE   │────────────────│ SET SESSION  │
                    │ CREDENTIALS │               │ & REDIRECT   │
                    └─────────────┘               │ to DASHBOARD │
                          │                       └──────────────┘
                         NO                             │
                          │                             ▼
                          ▼                           END
                    ┌──────────────┐
                    │ SHOW ERROR   │
                    │   MESSAGE    │
                    └──────────────┘
                          │
                          ▼
                        END
    """
    
    left = Inches(0.3)
    top = Inches(1.0)
    width = Inches(9.4)
    height = Inches(6.2)
    
    text_box = slide.shapes.add_textbox(left, top, width, height)
    text_frame = text_box.text_frame
    text_frame.word_wrap = True
    
    p = text_frame.paragraphs[0]
    p.text = flowchart_text
    p.font.size = Pt(10)
    p.font.name = 'Courier New'
    p.font.color.rgb = DARK_TEXT
    
    # Slide 13: Appointment Booking Flowchart
    slide = prs.slides.add_slide(prs.slide_layouts[6])
    
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    p = title_frame.paragraphs[0]
    p.text = "🔄 Flowchart - Appointment Booking"
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    title_frame.margin_left = Inches(0.3)
    
    appointment_flow = """
                        START
                          │
                          ▼
                    ┌─────────────┐
                    │  PATIENT    │
                    │   LOGGED    │
                    │     IN      │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │  NAVIGATE   │
                    │  TO BOOK    │
                    │ APPOINTMENT │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │   SELECT    │
                    │   DOCTOR    │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │SELECT DATE &│
                    │    TIME     │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │ REVIEW FEES │
                    │    & CONFIRM│
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │   PROCESS   │
                    │   PAYMENT   │
                    └─────────────┘
                          │
                    ┌─────┴─────┐
                   YES          NO
                    │             │
                    ▼             ▼
            ┌─────────────┐   ┌───────┐
            │   STORE     │   │FAILURE│
            │ IN DATABASE │   └───────┘
            └─────────────┘      │
                    │            │
                    ▼            ▼
            ┌─────────────┐     END
            │  SUCCESS    │
            │   EMAIL     │
            │   SENT      │
            └─────────────┘
                    │
                    ▼
                  END
    """
    
    left = Inches(0.3)
    top = Inches(1.0)
    width = Inches(9.4)
    height = Inches(6.2)
    
    text_box = slide.shapes.add_textbox(left, top, width, height)
    text_frame = text_box.text_frame
    text_frame.word_wrap = True
    
    p = text_frame.paragraphs[0]
    p.text = appointment_flow
    p.font.size = Pt(9)
    p.font.name = 'Courier New'
    p.font.color.rgb = DARK_TEXT
    
    # Slide 14: Patient Admission Flowchart
    slide = prs.slides.add_slide(prs.slide_layouts[6])
    
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    p = title_frame.paragraphs[0]
    p.text = "🔄 Flowchart - Patient Admission (Ward Management)"
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    title_frame.margin_left = Inches(0.3)
    
    admission_flow = """
                        START
                          │
                          ▼
                    ┌─────────────┐
                    │  WARD MGR   │
                    │   LOGGED    │
                    │     IN      │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │ NAVIGATE TO │
                    │  OCCUPIED   │
                    │    BEDS     │
                    └─────────────┘
                          │
                          ▼
                    ┌─────────────┐
                    │   CHECK     │
                    │AVAILABLE BED│
                    └─────────────┘
                          │
                    ┌─────┴─────┐
                 YES            NO
                    │             │
                    ▼             ▼
            ┌─────────────┐   ┌──────────┐
            │   SELECT    │   │WAIT/QUEUE│
            │  BED #      │   └──────────┘
            └─────────────┘
                    │
                    ▼
            ┌─────────────┐
            │  SELECT     │
            │  PATIENT    │
            └─────────────┘
                    │
                    ▼
            ┌─────────────┐
            │ SET ADMISSION│
            │    DATE     │
            └─────────────┘
                    │
                    ▼
            ┌─────────────┐
            │ CONFIRM &   │
            │  SUBMIT     │
            └─────────────┘
                    │
                    ▼
            ┌─────────────┐
            │UPDATE BEDTB │
            │ bed_status= │
            │ "Occupied"  │
            └─────────────┘
                    │
                    ▼
            ┌─────────────┐
            │SUCCESS EMAIL│
            └─────────────┘
                    │
                    ▼
                  END
    """
    
    left = Inches(0.3)
    top = Inches(1.0)
    width = Inches(9.4)
    height = Inches(6.2)
    
    text_box = slide.shapes.add_textbox(left, top, width, height)
    text_frame = text_box.text_frame
    text_frame.word_wrap = True
    
    p = text_frame.paragraphs[0]
    p.text = admission_flow
    p.font.size = Pt(9)
    p.font.name = 'Courier New'
    p.font.color.rgb = DARK_TEXT
    
    # Slide 15: Technology Stack
    add_content_slide(prs, "🛠️ Technology Stack", [
        "Frontend Layer:",
        "  • HTML5, CSS3, Bootstrap 4 - Responsive UI design",
        "  • JavaScript, jQuery - Dynamic interactions",
        "  • Font Awesome - Icons and graphics",
        "",
        "Backend Layer:",
        "  • PHP 7.2+ - Server-side processing",
        "  • Session Management - User authentication",
        "  • RESTful principles - API endpoints",
        "",
        "Database Layer:",
        "  • MySQL/MariaDB - Relational database",
        "  • InnoDB Engine - Transaction support",
        "  • Foreign Keys - Data integrity",
        "",
        "Server:",
        "  • Apache (XAMPP) - Web server"
    ])
    
    # Slide 16: Key Statistics
    add_content_slide(prs, "📊 System Statistics", [
        "👥 Users:",
        "  • Total Patients: 11 registered",
        "  • Total Doctors: 8 registered",
        "  • Admin/Receptionist: 1 account",
        "",
        "📅 Appointments:",
        "  • Total Appointments: 13",
        "  • Pending: 6 | Approved: 7",
        "",
        "🏥 Ward Management (NEW):",
        "  • Total Wards: 4",
        "  • Total Beds: 10",
        "  • Occupied Beds: 4",
        "  • Available Beds: 6",
        "",
        "💊 Prescriptions:",
        "  • Total Prescriptions: 4"
    ])
    
    # Slide 17: System Features
    add_content_slide(prs, "🎯 Core System Features", [
        "✅ User Management",
        "  • Registration, Login, Profile Management",
        "",
        "✅ Appointment System",
        "  • Booking, Approval, Cancellation, Tracking",
        "",
        "✅ Medical Records",
        "  • Prescriptions, Diagnosis, Medical History",
        "",
        "✅ Bed & Ward Management ⭐ NEW",
        "  • Ward Creation, Bed Allocation, Patient Admission/Discharge",
        "",
        "✅ Payment Processing",
        "  • Billing, Payment Tracking, Receipts",
        "",
        "✅ Reporting",
        "  • Statistics, Medical Reports, Admin Dashboard"
    ])
    
    # Slide 18: Color Scheme
    slide = prs.slides.add_slide(prs.slide_layouts[6])
    
    title_shape = slide.shapes.add_shape(1, Inches(0), Inches(0), Inches(10), Inches(0.8))
    title_shape.fill.solid()
    title_shape.fill.fore_color.rgb = PRIMARY_GREEN
    title_shape.line.color.rgb = PRIMARY_GREEN
    
    title_frame = title_shape.text_frame
    p = title_frame.paragraphs[0]
    p.text = "🎨 Professional Color Scheme & Branding"
    p.font.size = Pt(40)
    p.font.bold = True
    p.font.color.rgb = WHITE
    title_frame.margin_left = Inches(0.3)
    
    # Color boxes
    # Primary Green
    color1 = slide.shapes.add_shape(1, Inches(0.5), Inches(1.5), Inches(2), Inches(1))
    color1.fill.solid()
    color1.fill.fore_color.rgb = PRIMARY_GREEN
    color1.line.width = Pt(1)
    
    color1_text = slide.shapes.add_textbox(Inches(0.5), Inches(2.6), Inches(2), Inches(0.5))
    color1_tf = color1_text.text_frame
    p = color1_tf.paragraphs[0]
    p.text = "Primary Green\n#27ae60"
    p.font.size = Pt(14)
    p.font.bold = True
    p.font.color.rgb = WHITE
    p.alignment = PP_ALIGN.CENTER
    
    # Secondary Teal
    color2 = slide.shapes.add_shape(1, Inches(2.8), Inches(1.5), Inches(2), Inches(1))
    color2.fill.solid()
    color2.fill.fore_color.rgb = SECONDARY_TEAL
    color2.line.width = Pt(1)
    
    color2_text = slide.shapes.add_textbox(Inches(2.8), Inches(2.6), Inches(2), Inches(0.5))
    color2_tf = color2_text.text_frame
    p = color2_tf.paragraphs[0]
    p.text = "Secondary Teal\n#1abc9c"
    p.font.size = Pt(14)
    p.font.bold = True
    p.font.color.rgb = WHITE
    p.alignment = PP_ALIGN.CENTER
    
    # Dark Green
    color3 = slide.shapes.add_shape(1, Inches(5.1), Inches(1.5), Inches(2), Inches(1))
    color3.fill.solid()
    color3.fill.fore_color.rgb = DARK_GREEN
    color3.line.width = Pt(1)
    
    color3_text = slide.shapes.add_textbox(Inches(5.1), Inches(2.6), Inches(2), Inches(0.5))
    color3_tf = color3_text.text_frame
    p = color3_tf.paragraphs[0]
    p.text = "Dark Green\n#16a085"
    p.font.size = Pt(14)
    p.font.bold = True
    p.font.color.rgb = WHITE
    p.alignment = PP_ALIGN.CENTER
    
    # White
    color4 = slide.shapes.add_shape(1, Inches(7.4), Inches(1.5), Inches(2), Inches(1))
    color4.fill.solid()
    color4.fill.fore_color.rgb = WHITE
    color4.line.color.rgb = PRIMARY_GREEN
    color4.line.width = Pt(2)
    
    color4_text = slide.shapes.add_textbox(Inches(7.4), Inches(2.6), Inches(2), Inches(0.5))
    color4_tf = color4_text.text_frame
    p = color4_tf.paragraphs[0]
    p.text = "White\n#ffffff"
    p.font.size = Pt(14)
    p.font.bold = True
    p.font.color.rgb = PRIMARY_GREEN
    p.alignment = PP_ALIGN.CENTER
    
    # Branding info
    info_text = slide.shapes.add_textbox(Inches(0.5), Inches(3.8), Inches(9), Inches(3))
    info_tf = info_text.text_frame
    info_tf.word_wrap = True
    
    p = info_tf.paragraphs[0]
    p.text = """🏥 BRANDING GUIDE:

Hospital Name: GLOBAL HOSPITALS
Logo: Hospital Icon (Font Awesome: fa-user-plus)
Font: IBM Plex Sans

Theme: Healthcare Professional
• Primary colors convey trust, growth, and healthcare
• Green represents health, safety, and vitality
• White ensures cleanliness and medical professionalism
• Consistent branding across all pages and user interfaces"""
    
    p.font.size = Pt(14)
    p.font.color.rgb = DARK_TEXT
    
    # Slide 19: Implementation Highlights
    add_content_slide(prs, "⭐ Implementation Highlights", [
        "✨ NEW Ward Management System",
        "  • Complete bed and ward lifecycle management",
        "  • Real-time availability tracking",
        "  • Patient admission/discharge workflow",
        "",
        "✨ Green & White Professional Theme",
        "  • Consistent branding across all pages",
        "  • Modern healthcare appearance",
        "  • Responsive design for all devices",
        "",
        "✨ Session-based Security",
        "  • Role-based access control",
        "  • Secure authentication",
        "  • Protected endpoints",
        "",
        "✨ Real-time Dashboard Statistics",
        "  • Live bed availability",
        "  • Appointment tracking",
        "  • Patient metrics"
    ])
    
    # Slide 20: Conclusion
    add_content_slide(prs, "🎓 Conclusion", [
        "✅ Complete Hospital Management Solution",
        "   Streamlines patient care, appointments, and operations",
        "",
        "✅ Scalable Architecture",
        "   Built with modern web technologies and best practices",
        "",
        "✅ Professional Healthcare Branding",
        "   Green & White theme conveys trust and professionalism",
        "",
        "✅ Multiple User Roles",
        "   Patients, Doctors, Admins, and Ward Managers",
        "",
        "✅ Bed & Ward Management",
        "   New feature for complete hospital resource management",
        "",
        "✅ Ready for Production",
        "   Tested, documented, and deployable on any XAMPP/Apache server"
    ])
    
    # Slide 21: Thank You
    add_title_slide(prs, "Thank You!", "GLOBAL HOSPITALS\nHospital Management System")
    
    # Save presentation
    output_path = os.path.join(os.path.dirname(__file__), "HOSPITAL_MANAGEMENT_SYSTEM_PRESENTATION.pptx")
    prs.save(output_path)
    print(f"✅ Presentation created successfully: {output_path}")
    return output_path

if __name__ == "__main__":
    create_presentation()
