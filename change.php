<?php
session_start();
$host = 'localhost';
$dbname = 'gestionclfr';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
     
    $id = $_SESSION["client_id"];    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    if (isset($_POST['payer'])) {
        $id_facture_to_pay = $_POST['id_facture'];
    
        // Debugging: Print the ID to check if it's received correctly
        echo "ID Facture to Pay: " . $id_facture_to_pay . "<br>";
    
        $stmt = $conn->prepare('UPDATE facture SET Status = "payee" WHERE id_facture = :id_facture');
        $stmt->bindParam(':id_facture', $id_facture_to_pay);
        $stmt->execute();
    
        // Check for errors in the update query
        $errorInfo = $stmt->errorInfo();
        if ($errorInfo[0] != '00000') {
            echo "Error updating facture: " . $errorInfo[2];
        } else {
            // Update was successful
            header("Location: clientdash.php?id=" . urlencode($id) . "#Dashboard");
            exit();
        }
    }
    
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
