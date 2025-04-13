<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Enrollment</title>
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
        <h2>Course Enrollment</h2>
        <form action="process_enrollment.php" method="POST">
            <div class="form-group">
                <label for="student-id">Student ID*</label>
                <input type="text" id="student-id" name="student-id" required>
            </div>
            <div class="form-group">
                <label for="course-code">Course Code*</label>
                <input type="text" id="course-code" name="course-code" required>
            </div>
            <div class="form-group">
                <label for="course-title">Course Title</label>
                <select id="course-title" name="course-title">
                    <option value="">Select Course</option>
                    <option value="Introduction to Programming">Introduction to Programming</option>
                    <option value="Data Structures & Algorithms">Data Structures & Algorithms</option>
                    <option value="Cybersecurity Fundamentals">Cybersecurity Fundamentals</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Semester</label>
                <select id="semester" name="semester">
                    <option value="">Select Semester</option>
                    <option value="Fall 2025">Fall 2025</option>
                    <option value="Spring 2026">Spring 2026</option>
                    <option value="Summer 2026">Summer 2026</option>
                </select>
            </div>
            <button type="submit">Enroll</button>
        </form>
    </div>

</body>
</html>
