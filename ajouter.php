<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-image: url("img/5594016-e1656071131636.webp");
            background-position: center;
            background-size: cover;
        }
        .conso-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            max-width: 500px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border: 1px solid #ddd;
            margin: 0 auto;

            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .conso-box h2 {
            color:#A8AF8A;
            text-align: center;
            margin-bottom: 20px;
            font-size: px;
        }
        .parent {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
        }

        .div1 { grid-area: 1 / 1 / 2 / 2; }
        .div2 { grid-area: 1 / 2 / 2 / 3; }
        .div3 { grid-area: 2 / 1 / 3 / 3; }
        label {
    color: #A8AF8A;
    font-size: 18px; /* Adjusted font size */
    margin-bottom: 5px;
}
.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
}


    </style>
</head>
<body>
<?php
$host = 'localhost';
$dbname = 'gestionclfr';
$username = 'root';
$password = '';

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    
    IF($_SERVER['REQUEST_METHOD']==='POST'){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        
        $hashedPassword = password_hash($nom, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO client (nom, prenom, adresse, username, password ) VALUES (:nom, :prenom, :adresse , :username, :password)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt -> bindParam(':username', $prenom);
    $stmt->bindParam(':password', $hashedPassword);


    $stmt->execute();
    echo "<script>window.location.href = 'fourndash.php#GererClients';</script>";
   }

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
<div class="parent">
<div class="div1"> 
    <img src="img/Screenshot_2024-02-21_221710-removebg-preview (1).png" width="150px" alt="">
</div>
<div class="div2"> 
    <h1>Ajouter</h1>
</div>

<div class="div3">
    <div class="conso-box">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse:</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <button type="submit" class="btn btn-outline-secondary">Ajouter</button>

        </form>
    </div>


</div>
    
</body>
</html>
