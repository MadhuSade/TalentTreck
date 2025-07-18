<?php
include 'db.php'; // your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare statement: safe query
    $stmt = $conn->prepare("SELECT * FROM faculty WHERE email = ?");
    $stmt->bind_param("s", $email);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Check password hash
        if (password_verify($password, $user['password'])) {
            echo "Faculty login successful!";
            // Start session or redirect here
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Invalid email or password!";
    }

    $stmt->close();
}
?>
