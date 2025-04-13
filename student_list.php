<?php
include("db_connect.php");

// Fetch all students
$sql = "SELECT name, id, department, major, email FROM students";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete-id"])) {
    // Delete the student with the provided ID
    $delete_id = $_POST["delete-id"];
    $delete_sql = "DELETE FROM students WHERE id = '$delete_id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Student record deleted successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error deleting record: " . $conn->error . "</p>";
    }
    // Refresh the page to show updated results
    header("Location: student_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #006081;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 14px;
        }
        .navbar a:hover {
            background-color: #004d66;
            border-radius: 5px;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #006081;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #006081;
            color: white;
        }
        .no-data {
            color: red;
            font-size: 18px;
            text-align: center;
        }
        .action-button {
            padding: 5px 10px;
            background-color: #5bc0de;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .action-button:hover {
            background-color: #39a4cc;
        }
        .delete-button {
            padding: 5px 10px;
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="index.php">Add Student</a>
        <a href="student_list.php">Student List</a>
        <a href="enroll_course.php">Enroll in Course</a>
        <a href="enrollment_history.php">Enrollment History</a>
    </div>

    <div class="container">
        <h2>Registered Students</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Department</th>
                    <th>Major</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['name']}</td>
                                <td>{$row['id']}</td>
                                <td>{$row['department']}</td>
                                <td>{$row['major']}</td>
                                <td>{$row['email']}</td>
                                <td>
                                    <form method='POST' style='display:inline;'>
                                        <input type='hidden' name='delete-id' value='{$row['id']}'>
                                        <button type='submit' class='delete-button'>Delete</button>
                                    </form>
                                    <form method='GET' action='edit_student.php' style='display:inline;'>
                                        <input type='hidden' name='edit-id' value='{$row['id']}'>
                                        <button type='submit' class='action-button'>Edit</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-data'>No data in the table</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
