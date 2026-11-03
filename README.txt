CAMPUSFIX - SETUP FOR WINDOWS + XAMPP

1. Install XAMPP from https://www.apachefriends.org/
2. Open XAMPP Control Panel. Click Start beside Apache and MySQL.
3. Copy the CampusFix folder into C:\xampp\htdocs\
4. Open http://localhost/phpmyadmin/
5. Click Import. Choose CampusFix/database/campusfix.sql. Click Import/Go.
6. Configure environment credentials in .env (copy from .env.example if needed).
   Default XAMPP settings: DB_USER=root and DB_PASS= (blank).
7. Open http://localhost/CampusFix/
8. Register a student account and submit a test complaint.
9. Create admin once by opening http://localhost/CampusFix/admin/create_admin.php
   Admin credentials are read from .env:
   Admin email: admin@campusfix.local (or your ADMIN_EMAIL setting)
   Temporary password: Admin@12345 (or your ADMIN_PASSWORD setting)
10. DELETE admin/create_admin.php after running it.
11. Log in as admin. You will be sent to the admin dashboard.

Student: register at /CampusFix/register.php
Admin: login at /CampusFix/login.php

If database connection fails: check MySQL is running and verify settings in .env.
If localhost does not open: check Apache is running and the folder is inside htdocs.

This is a local academic demo. Test it and change the temporary admin password before any wider use.
