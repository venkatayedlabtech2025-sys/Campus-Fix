# 🏫 CampusFix

### College Complaint & Facility Management System

**A web-based platform for submitting, tracking, and managing campus
complaints.**

![PHP](https://img.shields.io/badge/PHP-Backend-777BB4?logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-Frontend-E34F26?logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-Styling-1572B6?logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-Interactive-F7DF1E?logo=javascript&logoColor=black)
![MariaDB](https://img.shields.io/badge/Database-MySQL%20Compatible-003545?logo=mariadb&logoColor=white)
:::

------------------------------------------------------------------------

## 📌 About the Project

**CampusFix** is a college complaint and facility management web
application designed to make campus issue reporting more organised.

Students can register, log in, and submit complaints through the
website. Authorised administrators can access the admin dashboard, view
submitted complaints, and manage their progress.

The application uses **PHP** for server-side processing and a
**MySQL-compatible database** for storing application data. It is
designed as an academic project and runs locally using **XAMPP**.

## 🎯 Project Objectives

-   Provide students with a simple platform to submit campus complaints.
-   Store complaint information in a central database.
-   Allow authorised administrators to view submitted complaints.
-   Support complaint progress management through an admin portal.
-   Reduce manual complaint-record handling.

## ✨ Main Features

### Student Portal

-   Student registration and login.
-   Submit campus-related complaints.
-   Store complaint information in the database.

### Admin Portal

-   Separate administrator login.
-   Admin dashboard.
-   View complaints submitted by students.
-   Manage complaint progress through the admin interface.

## 🧰 Technology Stack

  Layer                      Technology
  -------------------------- --------------------------
  Frontend                   HTML5, CSS3, JavaScript
  Backend                    PHP
  Database                   MySQL-compatible MariaDB
  Database Administration    phpMyAdmin
  Local Development Server   Apache (XAMPP)
  Version Control            Git and GitHub

## 💻 Requirements

-   Windows 10 or Windows 11.
-   [XAMPP for Windows](https://www.apachefriends.org/).
-   A web browser such as Google Chrome.
-   The CampusFix project files.

XAMPP provides Apache, PHP, MariaDB (MySQL-compatible), and phpMyAdmin
for local development.

------------------------------------------------------------------------

## ⚙️ Installation and Setup (Windows + XAMPP)

Follow these steps in order to run CampusFix locally.

### Step 1 --- Install XAMPP

1.  Visit the [official Apache Friends
    website](https://www.apachefriends.org/).
2.  Download and install XAMPP for Windows.
3.  Open the **XAMPP Control Panel**.
4.  Click **Start** beside **Apache** and **MySQL**.

### Step 2 --- Place the Project in the Web Server Folder

1.  Locate the extracted `CampusFix` project folder.

2.  Copy the complete folder.

3.  Paste it into:

    ``` text
    C:\xampp\htdocs\
    ```

The project path should be:

``` text
C:\xampp\htdocs\CampusFix\
```

### Step 3 --- Import the Database

1.  Open <http://localhost/phpmyadmin/>.
2.  Select the **Import** tab.
3.  Click **Choose File**.
4.  Select `CampusFix/database/campusfix.sql`.
5.  Click **Import** or **Go**.
6.  Wait for the database import confirmation.

### Step 4 --- Configure Environment Credentials

1.  Locate `.env.example` in the project, if provided.
2.  Copy it and rename the copy to `.env`.
3.  Open `.env` and configure the database settings for your XAMPP
    installation.

Default XAMPP values:

``` env
DB_HOST=localhost
DB_NAME=campusfix
DB_USER=root
DB_PASS=
```

If `.env.example` contains additional required settings, retain them and
configure them as appropriate.

> **Security:** Keep `.env` private. Do not commit real passwords or
> secret credentials to GitHub.

### Step 5 --- Open CampusFix

Visit:

<http://localhost/CampusFix/>

The CampusFix home page should load.

### Step 6 --- Test the Student Portal

1.  Open <http://localhost/CampusFix/register.php>.
2.  Register a student account.
3.  Log in using the registered account.
4.  Submit a test complaint.
5.  Confirm that the complaint is saved successfully.

### Step 7 --- Create the Administrator Account

Run the initial administrator setup only once by opening:

<http://localhost/CampusFix/admin/create_admin.php>

The account uses the values configured in `.env`:

  Setting              Default value
  -------------------- -------------------------
  Admin email          `admin@campusfix.local`
  Temporary password   `Admin@12345`

If `ADMIN_EMAIL` or `ADMIN_PASSWORD` is configured in `.env`, those
values are used instead.

**Important:** After the administrator account has been created
successfully, immediately delete:

``` text
admin/create_admin.php
```

Do not leave the account-creation script accessible.

### Step 8 --- Log In to the Admin Portal

1.  Open <http://localhost/CampusFix/login.php>.
2.  Enter the administrator credentials.
3.  After successful login, you should be redirected to the admin
    dashboard.
4.  Use the admin interface to view and manage student complaints.

------------------------------------------------------------------------

## 🔗 Important Application Pages

  --------------------------------------------------------------------------------
  Page                         URL
  ---------------------------- ---------------------------------------------------
  CampusFix Home               `http://localhost/CampusFix/`

  Student Registration         `http://localhost/CampusFix/register.php`

  Login (Student/Admin)        `http://localhost/CampusFix/login.php`

  Admin Dashboard              `http://localhost/CampusFix/admin/dashboard.php`

  Admin Complaint Management   `http://localhost/CampusFix/admin/complaints.php`
  --------------------------------------------------------------------------------

## 🛠️ Troubleshooting

### Database connection failed

-   Confirm that **MySQL** is running in the XAMPP Control Panel.
-   Check the database name, username, and password in `.env`.
-   Confirm that the `campusfix` database was imported successfully.

### Localhost does not open

-   Confirm that **Apache** is running.
-   Check that the project folder is inside `C:\xampp\htdocs\`.
-   Open `http://localhost/` to verify that the local server is running.

### Admin login does not work

-   Confirm that the administrator account was created successfully.
-   Check the admin email and password configured in `.env`.
-   Sign in through the shared login page.

------------------------------------------------------------------------

## 🔐 Security Notes

-   Keep `.env` out of GitHub and never publish private credentials.
-   Delete `admin/create_admin.php` immediately after creating the admin
    account.
-   Use a unique password for any environment beyond a local
    demonstration.
-   Do not publish real student information or private complaint
    attachments.
-   This project is intended for local academic demonstration. Review
    and strengthen its security before public deployment.

## 📚 Academic Project Note

CampusFix is an academic web development project demonstrating frontend
technologies, PHP-based backend processing, database integration, and
student/admin workflows.

## 👨‍💻 Project

**CampusFix --- College Complaint & Facility Management System**

*Making campus issue reporting and complaint management more organised.*

------------------------------------------------------------------------


**Thank you for exploring CampusFix!**

