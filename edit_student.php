<?php
include("db_connect.php");

// Fetch the student details based on the provided ID
if (isset($_GET["edit-id"])) {
    $edit_id = $_GET["edit-id"];
    $sql = "SELECT id, email, department, major FROM students WHERE id = '$edit_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
    } else {
        die("Student not found!");
    }
} else {
    die("Invalid request!");
}

// Handle form submission to update the student details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // Ensure ID is passed back
    $email = trim($_POST["email"]);
    $department = $_POST["department"];
    $major = $_POST["major"];

    // Update only department, major, and email in the database
    $update_sql = "UPDATE students SET email='$email', department='$department', major='$major' WHERE id='$id'";
    if ($conn->query($update_sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Student details updated successfully!</p>";
        header("Location: student_list.php"); // Redirect to the Student List page after successful update
        exit();
    } else {
        echo "<p style='color: red; text-align: center;'>Error updating record: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
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
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #006081;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #004d66;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Edit Student Information</h2>
        <form method="POST" action="edit_student.php?edit-id=<?php echo $student['id']; ?>">
            <!-- Hidden field to store Student ID -->
            <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <select id="department" name="department">
                    <option value="Computer Science" <?php echo $student['department'] == 'Computer Science' ? 'selected' : ''; ?>>Computer Science</option>
                    <option value="Electrical Engineering" <?php echo $student['department'] == 'Electrical Engineering' ? 'selected' : ''; ?>>Electrical Engineering</option>
                    <option value="Biology" <?php echo $student['department'] == 'Biology' ? 'selected' : ''; ?>>Biology</option>
                </select>
            </div>

            <div class="form-group">
                <label for="major">Major</label>
                <select id="major" name="major">
                    <option value="Artificial Intelligence" <?php echo $student['major'] == 'Artificial Intelligence' ? 'selected' : ''; ?>>Artificial Intelligence</option>
                    <option value="Cybersecurity" <?php echo $student['major'] == 'Cybersecurity' ? 'selected' : ''; ?>>Cybersecurity</option>
                    <option value="Robotics" <?php echo $student['major'] == 'Robotics' ? 'selected' : ''; ?>>Robotics</option>
                </select>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
