<?php
include('config.php');  // Include your database connection

// Check if a delete request has been made
if (isset($_GET['delete'])) {
    $student_id = (int) $_GET['delete']; // Get the student ID from the URL

    // Debugging the student ID
    echo "Delete request for student ID: " . $student_id . "<br>";

    if ($student_id <= 0) {
        echo "Invalid student ID.";
        exit;
    }

    // Begin a transaction to ensure all delete operations happen atomically
    $conn->begin_transaction();

    try {
        // Delete from payments table
        $sql_delete_payments = "DELETE FROM payments WHERE student_id = ?";
        $stmt = $conn->prepare($sql_delete_payments);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        echo "Payments deleted<br>";

        // Delete from enrollment table
        $sql_delete_enrollment = "DELETE FROM enrollment WHERE student_id = ?";
        $stmt = $conn->prepare($sql_delete_enrollment);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        echo "Enrollment deleted<br>";

        // Delete from students table
        $sql_delete_student = "DELETE FROM students WHERE student_id = ?";
        $stmt = $conn->prepare($sql_delete_student);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
        echo "Student deleted<br>";

        // Commit the transaction
        $conn->commit();
        echo "Transaction committed!<br>";

        // Redirect after successful deletion
        header("Location: admindashboard.php?delete_success=1");
        exit();
    } catch (Exception $e) {
        // If an error occurs, rollback the transaction
        $conn->rollback();
        echo "Error deleting student: " . $e->getMessage();
    }
}

// Query to fetch all students, their enrolled course, and teacher information
$sql = "
        SELECT s.first_name AS student_first_name, s.last_name AS student_last_name, 
               c.course_name, 
               t.first_name AS teacher_first_name, t.last_name AS teacher_last_name, 
               s.student_id
        FROM students s
        JOIN enrollment e ON s.student_id = e.student_id
        JOIN courses c ON e.course_id = c.course_id
        JOIN teachers t ON c.course_name = t.subject
";

$result = $conn->query($sql);

// Check if the query executed successfully
if (!$result) {
    echo "Error executing query: " . $conn->error;
    exit;
}

// If no students are found
if ($result->num_rows == 0) {
    echo "No students found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students Enrollment Details</title>
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <h1>Admin Dashboard</h1>
    <br>
    <div class="button-container">
    <a href="dashboard.php"><button>View Dashboard</button></a>
    <a href="payments.php"><button>View Payments</button></a>
    </div>
    <br>
    <h2>All Students Enrollment Details</h2>

    <?php
    // Check if the delete operation was successful
    if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1) {
        echo "<p style='color: green;'>Student successfully deleted!</p>";
    }
    ?>

    <!-- Table to display student details -->
    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Course Enrolled</th>
                <th>Teacher Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['student_first_name'] . " " . $row['student_last_name']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['teacher_first_name'] . " " . $row['teacher_last_name']; ?></td>
                    <td>
                        <a href="admindashboard.php?delete=<?php echo $row['student_id']; ?>" onclick="return confirm('Are you sure you want to delete this student?');">
                            <button>Delete</button>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="index.php"><button>Logout</button></a>
    </div>
</body>
</html>
