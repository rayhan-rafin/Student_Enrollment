<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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
            justify-content: space-between; /* Adjust alignment */
            align-items: center; /* Vertically align items */
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
        .form-group input, .form-group select, .form-group textarea {
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

    <!-- Ribbon Navigation Bar -->
    <div class="navbar">
        <span class="title">Student Management System</span>
        <div>
            <a href="index.php">Add Student</a>
            <a href="student_list.php">Student List</a>
            <a href="enroll_course.php">Enroll in Course</a>
            <a href="enrollment_history.php">Enrollment History</a>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="container">
        <h2>Register New Student</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="id">Student ID*</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select id="department" name="department">
                    <option value="">Select department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Biology">Biology</option>
                </select>
            </div>
            <div class="form-group">
                <label for="major">Major</label>
                <select id="major" name="major">
                    <option value="">Select major</option>
                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Robotics">Robotics</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" rows="3"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
