<?php 
// Include all the php files needed here
require_once 'config.php';


// Example query to fetch students and their corresponding courses
// $sql = "SELECT students.*, courses.course_name 
//         FROM students 
//         LEFT JOIN courses ON students.course_id = courses.id";

// $stmt = $pdo->query($sql);
// $students = $stmt->fetchAll();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- Box Icons  -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- Styles  -->
    <link rel="shortcut icon" href="assets/img/kxp_fav.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="sidebar close">
        <!-- ========== Logo ============  -->
        <a href="#" class="logo-box">
            <i class='bx bxl-xing'></i>
            <div class="logo-name">Student</div>
        </a>

        <!-- ========== List ============  -->
        <ul class="sidebar-list">
            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="index.php" class="link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="index.php" class="link submenu-title">Dashboard</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Dropdown List Item ------- -->
            <!-- <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-collection'></i>
                        <span class="name">Category</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Category</a>
                    <a href="#" class="link">HTML & CSS</a>
                    <a href="#" class="link">JavaScript</a>
                    <a href="#" class="link">PHP & MySQL</a>
                </div>
            </li> -->

            <!-- -------- Dropdown List Item ------- -->
            <!-- <li class="dropdown">
                <div class="title">
                    <a href="#" class="link">
                        <i class='bx bx-book-alt'></i>
                        <span class="name">Posts</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Posts</a>
                    <a href="#" class="link">Web Design</a>
                    <a href="#" class="link">Login Form</a>
                    <a href="#" class="link">Card Design</a>
                </div>
            </li> -->
            



            <!-- -------- Enrolled Subjects ------- -->
            <li>
                <div class="title">
                    <a href="subjects.php" class="link">
                        <i class='bx bx-line-chart'></i>
                        <span class="name">Enrolled Subjects</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="subjects.php" class="link submenu-title">Enrolled Subjects</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Grades ------- -->
            <li>
                <div class="title">
                    <a href="grades.php" class="link">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="name">Grades</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="grades.php" class="link submenu-title">Grades</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Curriculum Checklist ------- -->
            <li class="dropdown">
                <div class="title">
                    <a href="curriculum_checklist.php" class="link">
                        <i class='bx bx-extension'></i>
                        <span class="name">Curriculum Checklist</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="curriculum_checklist.php" class="link submenu-title">Curriculum Checklist</a>
                    <!-- <a href="#" class="link">UI Face</a>
                    <a href="#" class="link">Pigments</a>
                    <a href="#" class="link">Box Icons</a> -->
                </div>
            </li>

            <!-- -------- Enrollment ------- -->
            <li>
                <div class="title">
                    <a href="enrollment.php" class="link">
                        <i class='bx bx-compass'></i>
                        <span class="name">Enrollment</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="enrollment.php" class="link submenu-title">Enrollment</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="profile.php" class="link">
                        <i class='bx bx-history'></i>
                        <span class="name">Profile</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="profile.php" class="link submenu-title">Profile</a>
                    <!-- submenu links here  -->
                </div>
            </li>

            <!-- -------- Non Dropdown List Item ------- -->
            <li>
                <div class="title">
                    <a href="settings.php" class="link">
                        <i class='bx bx-cog'></i>
                        <span class="name">Settings</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="settings.php" class="link submenu-title">Settings</a>
                    <!-- submenu links here  -->
                </div>
            </li>


            <li>
                <div class="title">
                    <a href="logout.php" class="link">
                        <i class='bx bx-cog'></i>
                        <span class="name">Logout</span>
                    </a>
                    <!-- <i class='bx bxs-chevron-down'></i> -->
                </div>
                <div class="submenu">
                    <a href="#" class="link submenu-title">Logout</a>
                    <!-- submenu links here  -->
                </div>
            </li>
        </ul>
    </div>

    <!-- ============= Home Section =============== -->

</body>

</html>