<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
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
            color: #A8AF8A;
            text-align: center;
            margin-bottom: 20px;
            font-size: 34px;
            font-variant: small-caps;
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 0px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 2;
        }

        .div2 {
            grid-area: 1 / 2 / 2 / 3;
        }

        .div3 {
            grid-area: 2 / 1 / 3 / 3;
        }

        label {
            color: #A8AF8A;
            font-size: 18px;
            /* Adjusted font size */
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
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $id =  $_SESSION["client_id"];
        $id_reclamation = isset($_GET['id_reclamation']) ? $_GET['id_reclamation'] : "";

    


                ?>

                <div class="parent">
                    <div class="div1">
                        <img src="img/Screenshot_2024-02-21_221710-removebg-preview (1).png" width="150px" alt="">
                    </div>
                   

                    <div class="div3">
                        <div class="conso-box">
                            <h2>FeedBack</h2>
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="objet" class="form-label">Object:</label>
                                    <input type="text" class="form-control" id="objet" name="objet" required>
                                </div>

                                <div class="mb-3">
                                     <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                       
                                </div>

                              
                                <button type="submit" class="btn btn-outline-secondary">Send</button>
                                <br>
                            <a href="fourndash.php">go back</a>
                            </form>
                        </div>


                    </div>

            </body>

            </html>
            <?php
     
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $object = $_POST['objet'];
        $message = $_POST['message'];
    
        $stmtInsert = $conn->prepare("INSERT INTO notification (id_client, objet, message, date_n) VALUES(:id, :objet, :message, NOW()) ");
        $stmtInsert->bindParam(':id', $id);
        $stmtInsert->bindParam(":objet", $object);
        $stmtInsert->bindParam(":message", $message);
        $stmtInsert->execute();
    
        // Check if the insertion was successful before attempting to delete
        if ($stmtInsert->rowCount() > 0) {
            // Insertion successful, now delete from reclamation
            $stmtDelete = $conn->prepare("DELETE FROM reclamation WHERE id_client = :id and id_reclamation =:id_reclamation");
            $stmtDelete->bindParam(':id', $id);
            $stmtDelete->bindParam(':id_reclamation',    $id_reclamation );
            $stmtDelete->execute();
            
            // Check if the deletion was successful
            if ($stmtDelete->rowCount() > 0) {
                echo "<script>window.location.href = 'fourndash.php#Reaclamation';</script>";
            } else {
                echo "";
            }
        } else {
            echo "Error inserting record into notification table.";
        }
    }
    

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }


    ?>