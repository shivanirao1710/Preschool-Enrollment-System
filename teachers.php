<?php
include('config.php');



// Fetch teachers data
$sql = 
"SELECT * FROM teachers";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers List</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background-image: url('https://media.istockphoto.com/id/916390018/vector/group-of-preschool-kids-and-teacher-sitting-on-the-floor-teacher-explaining-alphabet-to.jpg?s=612x612&w=0&k=20&c=Yz8xGorMtP0lJAoxTR0jhERiyE-JFRLCtwHhDrqQCFs='); 
        background-size: cover; 
        background-repeat: no-repeat; ">

    <h2>Teachers</h2>

    <table >
        <tr>
            <th>Teacher ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Subject</th>
            <th>Hire Date</th>
            <th>Contact Number</th>
        </tr>
        <?php
        // Display teachers data
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["teacher_id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["subject"] . "</td>
                    <td>" . $row["hire_date"] . "</td>
                    <td>" . $row["contact_number"] . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No teachers found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <div class="button-container">
        <a href="userdashboard.php"><button>Back to Home</button></a>
    </div>

</body>
</html>
