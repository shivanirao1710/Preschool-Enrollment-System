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
<body style="background-image: url('https://png.pngtree.com/background/20210709/original/pngtree-teachers-day-poster-background-blackboard-teacher-picture-image_923371.jpg'); 
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
