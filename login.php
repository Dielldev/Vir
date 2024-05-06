<?php

include_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $first_name = $_POST['first_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE first_name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die('Gabim gjatë përgatitjes: ' . $conn->error);
    }

    $stmt->bind_param('s', $first_name);
    $stmt->execute();

    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Përpunoni rezultatin sipas nevojave tuaja
        $row = $result->fetch_assoc();
        
        // Kontrolloni fjalëkalimin
        if (password_verify($password, $row['password'])) {
            // Sukses, përdoruesi u autentikua
            echo "You are logged in!";
            header("refresh:2; url=index2.php");
        } else {
            // Fjalëkalimi i pasaktë
            echo "Incorrect password!";
            header("refresh:2; url=login1.php");
        }
    } else {
        // Përdoruesi nuk ekziston
        echo "User does not exist!";
        header("refresh:2; url=login1.php");
    }

    // Mbyll statement-in
    $stmt->close();
}
?>