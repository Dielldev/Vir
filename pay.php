<?php

include_once('connection.php');

if (isset($_POST["submit"])) {
    // Përpuno dhe verifiko të dhënat nga forma
    $name =  mysqli_real_escape_string($conn, $_POST['name']);
    $card_number =  mysqli_real_escape_string($conn, $_POST['card_number']);
    $expirity_date = mysqli_real_escape_string($conn, $_POST['expirity_date']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);

    // Sigurohuni që user_id është një vlerë e vlefshme (për shembull, merrni nga sesioni ose shiko në bazën e të dhënave)
    $user_id = 1; // Ndryshoni me vlerën e duhur, mund të merrni nga sesioni ose baza e të dhënave

    // Përdorimi i prepared statements për të shmangur SQL Injection
    $sql = "INSERT INTO `orders`(`name`, `card_number`, `expirity_date`, `cvv`, `id`) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Kontrolloni nëse përgatitja e kërkesës ka pësuar sukses
    if ($stmt) {
        // Ekzekuto kërkesën
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $card_number, $expirity_date, $cvv, $user_id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: index2.php?msg=New record created successfully");
            exit(); // Duhet të dallohet pas përcjelljes
        } else {
            echo "Failed to create order: " . mysqli_error($conn);
        }

        // Mbyll përgatitjen e deklaratës
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the statement";
    }

    // Mbyll lidhjen me bazën e të dhënave në fund të skriptit ose sipas nevojës
    mysqli_close($conn);
}
?>