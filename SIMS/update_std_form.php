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

    // Retrieve the student's information
    $sql = "SELECT * FROM `std_info` WHERE `id` = $studentId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Edit Student Information</title>
</head>
<body>
    <form method="post" action="update_std.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        id: <?php echo $row['id']; ?></br>
        name: <input type="text" name="en_name" value="<?php echo $row['en_name']; ?>"></br>
        surname: <input type="text" name="en_surname" value="<?php echo $row['en_surname']; ?>"></br>
        ชื่อ: <input type="text" name="th_name" value="<?php echo $row['th_name']; ?>"></br>
        นามสกุล: <input type="text" name="th_surname" value="<?php echo $row['th_surname']; ?>"></br>
        Major: <input type="text" name="major_code" value="<?php echo $row['major_code']; ?>"></br>
        Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"></br>
        <input type="submit"><input type="reset">
        
    </form>
</body>
</html>
<?php
    } else {
        echo "Student not found.";
    }
} else {
    echo "Student ID not provided.";
}

mysqli_close($conn);
?>
