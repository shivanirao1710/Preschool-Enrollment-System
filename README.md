# Preschool Enrollment System

This is a DBMS mini-project for managing preschool enrollments. The system is built using PHP and MySQL and is designed to run on XAMPP.

---

## Prerequisites

Before running this project, ensure you have the following installed on your system:

- **XAMPP**: Includes Apache and MySQL.
- **Web Browser**: To access the application.

---

## Installation and Setup

Follow these steps to set up and run the project:

### Step 1: Download the Project Files
1. Clone or download the project repository from [GitHub/Source].
2. Extract the downloaded folder (if compressed).

### Step 2: Copy the Project Folder
1. Copy the entire project folder.
2. Paste it into the `htdocs` directory of your XAMPP installation. Typically located at:
   ```
   C:\xampp\htdocs
   ```

### Step 3: Import the Database
1. Start the XAMPP Control Panel and ensure the Apache and MySQL modules are running.
2. Open a web browser and navigate to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
3. Click on the **Import** tab.
4. Click **Choose File** and select the `preschooldb.sql` file from the project folder.
5. Click **Go** to import the database.

### Step 4: Configure Database Connection
1. Open the project folder in any text editor or IDE.
2. Locate the `config.php` file (or equivalent configuration file for database connections).
3. Ensure the database credentials match your local MySQL setup:
   ```php
   <?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "preschooldb";
   ?>
   ```

### Step 5: Run the Application
1. Open a web browser.
2. Navigate to [http://localhost/Preshool-Enrollment-System](http://localhost/Preschool-Enrollment-System) 
3. The application should now be accessible.

---

## Features

- **Student Enrollment**: Add and manage student details.
- **Class Management**: Assign students to classes.
- **Reports**: View and generate enrollment reports.
- **Admin Login**: Username: `admin`, Password: `admin123`

---

## Troubleshooting

- Ensure that the `Apache` and `MySQL` modules are running in the XAMPP Control Panel.
- Verify that the `preschooldb.sql` file is successfully imported without errors.
- Check the `config.php` file for correct database credentials.
- Confirm that the project folder is in the correct location under `htdocs`.

---

## License

This project is for educational purposes only.

---

## Contributors

- **Shivani** - Developer

---

Feel free to reach out if you encounter any issues!
