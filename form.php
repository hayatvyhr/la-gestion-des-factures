<?php 
session_start();
$host = 'localhost';
$dbname = 'gestionclfr';
$username = 'root';
$password = '';

try {
    
 

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_SESSION["client_id"];
    if (!isset($id) || $id === null) {
        echo 'Error: Invalid client ID';
        // Handle the case where the client ID is missing or invalid
    } else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envoyer'])) {
        $consommation = $_POST['consommation'];
        $dateinput = $_POST['consommationDate'];
        $image = $_FILES['consommationPicture']['name'];
        $target = 'img/' . $image;
        move_uploaded_file($_FILES['consommationPicture']['tmp_name'], $target);

        // Fetch the last date for the same user and id_client
        $lastDateQuery = $conn->prepare('SELECT MAX(dateM) AS lastDate FROM consommation WHERE id_client = :id');
        $lastDateQuery->bindParam(':id', $id);
        $lastDateQuery->execute();
        $lastDateResult = $lastDateQuery->fetch(PDO::FETCH_ASSOC);
        $lastDate = $lastDateResult['lastDate'];

        // Check if the new date is greater than the last date
        if ($lastDate === null || $dateinput > $lastDate  && $dateinput < date('Y-m-d H:i:s') ) {
            $stmt = $conn->prepare('INSERT INTO consommation(id_client, Consommation, image, dateM) VALUES (:id, :consommation, :image, :dates)');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':consommation', $consommation);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':dates', $dateinput);

            $stmt->execute();
            echo '<script>alert("Consommation added successfully!");</script>';
            echo '<script>window.location.href = "clientdash.php?id=' . $id . '#Saisir";</script>';

        } else {
            // Handle the case where the new date is not greater than the last date
            echo 'Error: The new date must be greater than the last date AND LESS THAN THE DATE OF SYSTEM.';
        }
    }

       
}

     
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


?>