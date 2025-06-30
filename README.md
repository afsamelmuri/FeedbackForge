# 📊 Online Faculty Feedback System

A web-based application designed to simplify and digitize the student-to-faculty feedback process in academic institutions. Built using WAMP (Windows, Apache, MySQL, PHP), this system allows students to submit structured feedback for their lecturers, while enabling HODs and Admins to view and act on real-time performance data.

---

## 🚀 Project Overview

The traditional paper-based feedback systems in many institutions are inefficient, time-consuming, and prone to data loss. This project provides a digital alternative that ensures seamless feedback collection, secure data storage, and instant report generation for better academic administration.

The system supports multiple user roles:
- 👨‍🎓 **Students** – Submit feedback on faculty.
- 👩‍🏫 **Faculty** – View feedback and improve accordingly.
- 🧑‍💼 **HODs** – Monitor performance and download reports.
- 👨‍💻 **Admin** – Manage users, subjects, faculty, and feedback data.

---

## 🎯 Key Features

### 🧑‍🎓 Student Module
- Register/Login with approval
- View assigned subjects/faculty
- Submit feedback on multiple parameters (teaching, discipline, punctuality, etc.)
- Track feedback submission status

### 🛠 Admin Module
- Add/Remove faculty
- Assign subjects to faculty
- Approve student registrations
- View student and faculty lists
- Generate reports based on semester and subject
- Monitor overall faculty performance

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL (via WAMP)
- **Web Server:** Apache (WAMP stack)

---

## 🖥️ System Requirements

- OS: Windows 7 or higher
- WAMP server (Apache, MySQL, PHP)
- Modern web browser (Chrome, Firefox)
- Minimum 1 GB RAM and 1 GHz processor

---

## 📦 Installation & Setup

1. Install WAMP server on your machine.
2. Clone this repository or download the zip file.
3. Place the project folder inside the `www` directory in WAMP (e.g., `C:/wamp/www/faculty_feedback/`).
4. Import the provided `.sql` file into MySQL using phpMyAdmin.
5. Open browser and go to: `http://localhost/faculty_feedback/`
6. Use default login or register as admin/student.

---

## 📊 Database Overview

- `student` – Stores student profile and login details.
- `faculty` – Stores faculty information.
- `subjects` – Manages subject list.
- `assign_subjects` – Links faculty to subjects.
- `feedback` – Stores feedback responses.
- `admin` – Admin login and profile data.

---

## 📌 Contribution & Maintenance

- Developed as part of academic curriculum at JCET, Hubballi.
- Can be extended to include analytics dashboards and exportable reports.

---

## 📄 License

This project is licensed under [MIT License](LICENSE) and developed under the Department of Computer Science and Engineering, JCET Hubballi.

---

