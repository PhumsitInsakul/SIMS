<?php
$servername = "localhost";
$username = "root";
$password = "So1752546";
$dbname = "students";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];

    $sql = "DELETE FROM `std_info` WHERE `id` = $studentId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Delete Record id $studentId Successfully! <a href='student.php'>Back</a>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Student ID not provided.";
}

mysqli_close($conn);
?>
