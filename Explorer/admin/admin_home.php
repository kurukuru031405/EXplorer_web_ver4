<?php
$host = "localhost"; 
$username = "root";
$password = "";
$dbname = "divinedb";
$port = 3306;

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}

$retrieve_students = $conn->query("SELECT * FROM Student;");
$retrieve_teachers = $conn->query("SELECT * FROM Teacher;");
?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="nav_admin_files\nav_admin_Q1GJ.css">
<link href="nav_admin_files\boxicons.min_Q1GJ.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="admin_home.css"/>

</head><body style="height: 491.8px;"><div class="header">
    <a href="#default" class="logo"><img src="tANA0h-1717114438.png" alt="dmfc">Divine Mercy College Foundation Inc.</a>
</div>
<div class="thirty-sixty">
    <nav>
    <ul class="nav-link">
        <li><a href="admin_home.php" class="nav-link" target="_Home">Home</a></li>
        <li><a href="default_content.php" target="_Home">Content</a></li>
        <li><a href="teacher_acc.php" class="nav-link" target="_Home">Manage Teacher</a></li>
        <li><a href="student_acc.php" class="nav-link" target="_Home">Manage Student</a></li>
        <li><a href="admin_profile.php" class="nav-link" target="_Home">Profile</a></li>
    </ul">
    </nav>
<main>

    <h2>Student Account Monitoring</h2>
    <form>
        <input type="text" placeholder="Please enter name" required />
        <a href="Screate_acc.html">Create Student Account</a>
    </form>
<body>
    <table>
        <thead>
            <tr>
                <th class="name">ID</th>
                <th class="Sname">Name</th>
                <th class="pass">Section</th>
                <th class="sel">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($retrieve_students->num_rows > 0) {
                    while ($row = $retrieve_students->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["ID"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["PlayerName"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Section"]) . "</td>";
                        echo "<td><a href=\"student_acc.php?id=". htmlspecialchars($row["ID"]) ."\">Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }            
            ?>
        </tbody>
    </table>
    
    <h2>Teacher Account Monitoring</h2>
    <input type="text" placeholder="Please enter name" required />
    <a href="Screate_acc.html">Create Student Account</a>
    <table>
        <thead>
            <tr>
                <th class="name">ID</th>
                <th class="Sname">Name</th>
                <th class="sel">Option</th>
            </tr>
        </thead>
        <tbody>

        <?php
            if ($retrieve_teachers->num_rows > 0) {
                    while ($row = $retrieve_teachers->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["ID"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["First_Name"]) . " " . htmlspecialchars($row["Middle_Initials"]) . " " . htmlspecialchars($row["Last_Name"]) . "</td>";
                        echo "<td><a href=\"teacher_acc.php?id=\"". htmlspecialchars($row["ID"]) ."\">Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                $conn->close();
        ?>
        </tbody>
    </table>
</main>
</div>
</body>
</html>

</body></html>