<?php
include("db_connect.php"); 

$search_id = ""; 
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search-id"])) {
    $search_id = trim($_POST["search-id"]); 
    $sql = "SELECT * FROM enrollment WHERE student_id = '$search_id'"; 
    $result = $conn->query($sql); 
} else {
    $sql = "SELECT * FROM enrollment"; 
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment History</title>
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
            justify-content: space-between;
            align-items: center;
        }
        .navbar .title {
            color: white;
            font-size: 20px;
            font-weight: bold;
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
        .search-form {
            margin-bottom: 20px;
        }
        .search-form input {
            padding: 8px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .search-form button {
            padding: 8px 15px;
            background-color: #006081;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .search-form button:hover {
            background-color: #004d66;
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
            padding: 10px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <span class="title">Student Management System</span>
        <div>
            <a href="index.php">Add Student</a>
            <a href="student_list.php">Student List</a>
            <a href="enroll_course.php">Enroll in Course</a>
            <a href="enrollment_history.php">Enrollment History</a>
        </div>
    </div>

    <div class="container">
        <h2>Enrollment History</h2>

        <form class="search-form" method="POST" action="enrollment_history.php">
            <input type="text" name="search-id" placeholder="Enter Student ID to search..." value="<?php echo htmlspecialchars($search_id); ?>">
            <button type="submit">Search</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Course Code</th>
                    <th>Course Title</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['student_id']}</td>
                                <td>{$row['course_code']}</td>
                                <td>{$row['course_title']}</td>
                                <td>{$row['semester']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-data'>No data in the table</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

