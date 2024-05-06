<?php
include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "You need to fill all the fields.";
    } else {
        $sql_check_username = "SELECT first_name FROM users WHERE first_name=?";
        $stmt_check_username = $conn->prepare($sql_check_username);
        $stmt_check_username->bind_param('s', $first_name);
        $stmt_check_username->execute();
        $stmt_check_username->store_result();

        if ($stmt_check_username->num_rows > 0) {
            echo "Username exists!";
        } else {
            $sql_insert = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);
            $stmt_insert->execute();
            
            echo "You are registered!";
            header("refresh:2; url=index2.php");
        }

        // Mbyll statement-in e kërkesës SELECT
        $stmt_check_username->close();
    }
}
?>