# Online Faculty Feedback System

## Introduction
The **Online Faculty Feedback System** is a web-based platform designed to streamline the process of collecting and managing feedback from students about their instructors. This system eliminates the manual, paper-based feedback collection process and introduces an efficient, digital method of submitting and evaluating faculty performance.

## Existing System
The traditional method involves collecting feedback from students manually using paper forms, which are then processed by the Head of Department (HOD) and shared with the Principal. This process is time-consuming and prone to delays. The **Online Faculty Feedback System** addresses these issues by automating the feedback collection and reporting process.

## Proposed System
This system is designed to allow students to easily submit feedback online, which is then processed in real-time and made available to the HOD and Principal for review. The system consists of four user roles:
1. **Students**: Can submit feedback on their instructors.
2. **Staff**: Can view feedback related to their performance.
3. **HOD**: Reviews the feedback and generates reports.
4. **Admin**: Manages users, faculty assignments, and system settings.

## Features
- **User-Friendly Interface**: Simple to use for both students and staff.
- **Automated Feedback Processing**: Reduces the time required to collect and review feedback.
- **Detailed Reports**: Admins and HODs can view feedback reports based on semester or subject.
- **Secure Authentication**: Ensures only authorized users can access the system.

## Technology Stack
- **Front-end**: HTML5, CSS3, JavaScript
- **Back-end**: PHP, MySQL (MariaDB)
- **Server**: WAMP (Windows, Apache, MySQL, PHP)

## System Design
### ER Diagram
The Entity-Relationship (ER) diagram outlines the relationships between different entities in the system, including students, feedback, faculty, and subjects.

### Database Schema
The system utilizes a relational database with several tables, including:
- `Admin`: Stores admin credentials and access information.
- `Batch_master`: Manages batch details and feedback numbers.
- `Branch_master`: Stores branch information.
- `Faculty_master`: Contains faculty details, including branch associations.
- `Feedback`: Records feedback responses from students.
- `Registration`: Stores student registration data, including department, semester, and division details.

## Installation Instructions
1. Download and install [WAMP](http://www.wampserver.com/en/).
2. Clone this repository into the WAMP server's `www` directory.
3. Import the provided SQL dump into MySQL to create the necessary tables.
4. Configure the database connection in the `config.php` file.
5. Start the WAMP server and navigate to `http://localhost/feedback-system` to begin using the system.

## Screenshots
Snapshots of the user interface, feedback submission forms, and admin panel are available in the `screenshots` folder.

## Future Enhancements
- Integration of graphical reports for better visualization of feedback.
- Addition of email notifications for faculty when feedback is submitted.
- Mobile-friendly interface for easier access on smartphones and tablets.

## Conclusion
The **Online Faculty Feedback System** simplifies the process of collecting, managing, and reviewing student feedback. By transitioning from a manual system to a digital platform, the system reduces administrative workload and provides timely, actionable insights into faculty performance.

## References
1. [Slideshare](https://www.slideshare.com)
2. [Tutorialspoint](https://www.tutorialspoint.com)
3. [W3Schools](https://www.w3schools.com)
4. [Bootstrap](https://getbootstrap.com)

---
Develop
