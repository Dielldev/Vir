
<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'vir_admin';

if (isset($_POST))

    $conn = new mysqli($server, $username, $password, $database);
if ($conn) {
    echo '';
} else {
    die(mysqli_error($conn));
}
