<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    echo "Student login successful!";
} else {
    echo "Invalid email or password!";
}
?>
