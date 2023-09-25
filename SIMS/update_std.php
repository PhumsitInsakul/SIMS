<?php
$servername = "localhost";
$username = "root";
$password = "So1752546";
$dbname = "students";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $en_name = $_POST["en_name"];
    $en_surname = $_POST["en_surname"];
    $th_name = $_POST["th_name"];
    $th_surname = $_POST["th_surname"];
    $major_code = $_POST["major_code"];
    $email = $_POST["email"];

    $sql = "UPDATE `std_info` SET `en_name`='$en_name', `en_surname`='$en_surname', `th_name`='$th_name', `th_surname`='$th_surname', `major_code`='$major_code', `email`='$email' WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Update Record id $id Successfully! <a href='student.php'>Back</a>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
