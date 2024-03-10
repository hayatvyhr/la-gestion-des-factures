<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;

            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;

            overflow: hidden;
        }

        .table-responsive {
            max-height: 400px;
            /* Set a maximum height for the table container */
            overflow: auto;
            /* Enable scroll bar if the content exceeds the container height */
        }

        .conso-box {
            display: flex;
            flex-direction: column;
            width: 500px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border: 1px solid #ddd;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-left: 18rem;
        }

        .conso-box1 {
            display: flex;
            flex-direction: column;
            width: 500px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border: 1px solid #ddd;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #A8AF8A;
            text-align: center;
            margin-bottom: 20px;
            font-size: 34px;
            font-variant: small-caps;
        }

        section {
            margin-bottom: 2rem;
            padding: 80px 100px;
            margin-top: 2rem;
        }

        .conso-box input {
            width: 80%;
            background: transparent;
            height: 40px;
            margin-left: 2rem;

        }

        label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #9c9d97;
            width: 80%;

        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            height: 100%;
        }



        h1 {
            margin-left: 4rem;
            color: black;
        }

        .buttons-container {
            top: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            align-items: center;
            justify-content: center;
            justify-content: flex-start;
            background-color: #9c9d97;
            height: 100%;
            padding: 10px;
            box-sizing: border-box;
            position: fixed;
        }

        .dashboard-button {
            margin-bottom: 20px;
            padding: 8px;
            background-color: #9c9d97;
            color: white;
            border: none;
            width: 100%;
            cursor: pointer;
            text-decoration: none;
            top: 0;
            left: 0;
            align-items: center;

        }

        a {
            font-size: 25px;
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: #474f52;
        }

        main {
            background-image: url("img/5594016-e1656071131636.webp");
            background-position: center;
            background-size: cover;
            margin-left: 200px;
            width: calc(100% - 210px);
            padding: 20px;
            box-sizing: border-box;
        }

        .logout-icon {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 8px;
            background-color: #9c9d97;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        button i {
            width: 34px;
        }

        .sp {
            color: white;
            width: 40px;
            font-size: 15px;
            background-color: RED;
        }

        .parent {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-column-gap: 20px;
            grid-row-gap: 0px;
        }

        .div1 {
            grid-area: 1 / 1 / 2 / 3;
        }

        .div2 {
            grid-area: 2 / 1 / 3 / 2;

        }

        .div3 {
            grid-area: 2 / 2 / 3 / 3;
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

        $id = $_SESSION["client_id"];






        ?>


        <div class="dashboard-container">


            <div class="buttons-container">
                <img src="img/Screenshot_2024-02-21_221710-removebg-preview (1).png" alt="//" width="160px">
                <button class="dashboard-button"><a href="#Dashboard"><i
                            class="fa-solid fa-house"></i>Dashboard</a></button>
                <button class="dashboard-button"><a href="#Saisir"><i class="fa-solid fa-pen"></i>Consommation </a></button>
                <button class="dashboard-button"><a href="#Consulter"><i class="fa-solid fa-book"></i>Consulter</a></button>
                <button class="dashboard-button"><a href="#Reclamation"><i
                            class="fa-solid fa-comments"></i>Réclamation</a></button>
                <button class="dashboard-button"><a href="#Notification"><i
                            class="fa-solid fa-paper-plane"></i></span>Notification</a>
                    <?php $stmt = $conn->query("SELECT * FROM notification where id_client = $id");
                    $rowCount = $stmt->rowCount();
                    echo '<span class="sp">' . $rowCount . '</span>';
                    ?><span>
                </button>
                <span class="logout-icon" onclick="logout()"><i class="fa-solid fa-right-from-bracket">Logout</i></span>
            </div>

            <!-- Other dashboard components -->
            <main>

                <section id="Dashboard">
                    <div class="parent">
                        <div class="div1">
                            <h2>Bienvenue</h2>
                        </div>
                        <div class="div2">
                            <div class="conso-box1">
                                <form method="post" action="">
                                    <label for="consommationDateInput" width="400px">Select Mois:</label>
                                    <input type="date" id="consommationDate" name="consommationDate" required
                                        class="form-control">
                                    <button type="submit" name="submit"
                                        class="btn btn-outline-secondary mx-auto d-block mt-3">Consommation en KW</button>
                                </form>



                                <?php


                                try {

                                    // Check if the form is submitted
                                    if (isset($_POST['submit'])) {
                                        // Get the selected date
                                        $selectedDate = $_POST['consommationDate'];

                                        // Prepare the SQL query with named placeholders
                                        $sql = "SELECT Consommation FROM consommation WHERE dateM = :selectedDate";
                                        $stmt = $conn->prepare($sql);

                                        $stmt->bindParam(':selectedDate', $selectedDate, PDO::PARAM_STR);

                                        $stmt->execute();

                                        $result = $stmt->fetch(PDO::FETCH_ASSOC);

                                        if ($result) {
                                            echo '<br><br><label for="consommationNumberInput">Consommation:</label>';
                                            echo '<input type="number" id="consommationNumberInput" class="form-control" name="consommation" step="any" min="0" value="' . $result['Consommation'] . '" readonly style="width: 100px;">';
                                        } else {
                                            echo '<br><br>No consumption data available for the selected date.';
                                        }
                                    }

                                } catch (PDOException $e) {
                                    echo "Connection failed: " . $e->getMessage();
                                }
                                ?>

                            </div>



                        </div>
                        <div class="div3">

                            <?php
                            $stmt = $conn->query("SELECT * FROM facture where Status = 'non payee' and id_client =$id");
                            $factureps = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            // Output data into the table
                            echo '<table class=" table table-striped  mt-4" id="clientsTable">
        <thead>
            <tr>
                <th>Facture</th>
                <th>Date</th>
                <th>Consulter</th>
                <th>Payer</th>
            </tr>
        </thead>
        <tbody>';

                            foreach ($factureps as $facturep) {
                                echo '<tr>';
                                echo '<td>' . $facturep['id_facture'] . '</td>';
                                echo '<td>' . $facturep['date_facture'] . '</td>';
                                echo '<td><a href="clientdash.php#Consulter"><button type="button" class="btn btn-outline-secondary">Consulter</button></a></td>';

                                // Add form for "Payer" button with a hidden input field
                                echo '<td>
                                    <form action="change.php?id=' . $id . '&id_facture=' . $facturep['id_facture'] . '" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id_facture" value="' . $facturep['id_facture'] . '">
                <button type="submit" class="btn btn-outline-secondary" name="payer">Payer</button>
            </form>
          </td>';

                                echo '</tr>';
                            }

                            echo '</tbody></table>';
                            ?>

                        </div>
                    </div>
                </section>
                <section id="Saisir">

                    <div class="conso-box">
                        <h2>Consommation</h2>
                        <form method="POST" enctype="multipart/form-data" action="form.php">
                            <label for="consommationNumberInput">Consommation:</label>
                            <input type="number" id="consommationNumberInput" name="consommation" step="any" min="0"
                                placeholder="Saisir votre Consommation.." required class="form-control " />
                            <br> <br>
                            <label for="consommationDateInput">Select Mois:</label>
                            <input type="date" id="consommationDate" name="consommationDate" required class="form-control">
                            <br> <br>
                            <label for="consommationFileInput">une Photo du compteur:</label>
                            <input type="file" id="consommationFileInput" name="consommationPicture" required
                                class="form-control" />

                            <br>
                            <button type="submit" class="btn btn-outline-secondary mx-auto d-block mt-3"
                                name="envoyer">Envoyer</button>
                        </form>
                    </div>
                </section>

                <section id="Consulter">
                    <h2>Consulter</h2>
                    <div class="input-group mb-3">
                        <label for="search" class="visually-hidden">Search:</label>
                        <span class="input-group-text bg-primary text-light"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="search" placeholder="Search...">
                    </div>
                    <?php
                    require_once('TCPDF-main/tcpdf.php');

                    $pdf = new TCPDF();


                    $pdf->AddPage();
                    if (isset($_POST['telecharger'])) {
                        $stmt = $conn->prepare('SELECT Consommation, dateM FROM consommation WHERE id_client = :id ORDER BY dateM DESC');
                        $stmt->bindParam(':id', $id);
                        $stmt->execute();
                        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $numEntries = count($entries);

                        if ($numEntries >= 2) {
                            for ($i = 0; $i < $numEntries - 1; $i++) {
                                $consommation1 = $entries[$i + 1]['Consommation'];
                                $consommation2 = $entries[$i]['Consommation'];
                                $difference = $consommation2 - $consommation1;

                                // Check if an entry with the same id_client and date_facture already exists
                                $checkStmt = $conn->prepare('SELECT id_facture FROM facture WHERE id_client = :id AND date_facture = :date_facture');
                                $checkStmt->bindParam(':id', $id);
                                $checkStmt->bindParam(':date_facture', $entries[$i]['dateM']);
                                $checkStmt->execute();
                                $existingEntry = $checkStmt->fetch(PDO::FETCH_ASSOC);

                                if (!$existingEntry) {
                                    // Entry doesn't exist, insert a new one
                                    try {
                                        $insertStmt = $conn->prepare('INSERT INTO facture(id_client, Consommation, Status, date_facture) VALUES (:id, :difference, "en_attente", :date_facture)');
                                        $insertStmt->bindParam(':id', $id);
                                        $insertStmt->bindParam(':difference', $difference);
                                        $insertStmt->bindParam(':date_facture', $entries[$i]['dateM']);
                                        $insertStmt->execute();
                                    } catch (PDOException $e) {
                                        echo 'Connection failed: ' . $e->getMessage();
                                    }
                                } else {







                                    $stmt = $conn->prepare('SELECT f.prix, f.id_facture, f.Consommation,cn.dateM, f.Status, f.date_facture, c.nom, c.prenom, c.adresse , cn.image FROM facture f
                    INNER JOIN client c inner join consommation cn ON f.id_client = c.id_client 
                    WHERE f.Consommation > 0 and f.Consommation<1000000 and cn.dateM= f.date_facture');

                                    $stmt->execute();
                                    $factures = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($factures as $index => $facture) {
                                        if ($facture['Consommation'] > 0 && $facture['Consommation'] <= 100) {
                                            $ttc = 0.8;
                                        } elseif ($facture['Consommation'] >= 101 && $facture['Consommation'] <= 200) {
                                            $ttc = 0.9;
                                        } elseif ($facture['Consommation'] >= 201) {
                                            $ttc = 1;
                                        }
                                        $prix = $facture['Consommation'] * $ttc + 0.14;
                                        if ($facture['Status'] == 'en_attente' && $facture['Consommation'] < 0) {
                                            continue;
                                        } else {

                                            if ($index !== 0) {
                                                $pdf->AddPage(); // Add a new page for subsequent iterations
                                            }


                                            // Title
                                            $pdf->SetFont('helvetica', 'B', 30);
                                            $pdf->Cell(0, 10, 'Facture', 0, 1, 'C'); // Title
                                            $pdf->Ln(20); // Add a new line between entries
                                            $pdf->SetFont('helvetica', 'B', 20);
                                            $pdf->SetTextColor(156, 157, 151); // RGB values for #9c9d97
                                            $pdf->Cell(0, 10, 'Capture du Compteur', 0, 1, 'C');

                                            // Add image to the PDF
                                            $imagePath = __DIR__ . '/img/' . $facture['image']; // Path to the image
                                            $xPosition = 10; // X-coordinate position
                                            $yPosition = $pdf->GetY(); // Y-coordinate position (use current Y position)
                                            $imageWidth = 50; // Image width
                                            $imageHeight = 50; // Image height
                                            $pdf->Image($imagePath, $xPosition, $yPosition, $imageWidth, $imageHeight);
                                            $pdf->Ln(50); // Add a new line between image and other entries
                
                                            $pdf->SetFillColor(156, 157, 151);
                                            $pdf->SetTextColor(0, 0, 0);
                                            $pdf->SetFont('helvetica', 'B', 12);
                                            $pdf->Cell(40, 10, 'Label', 1, 0, 'C', true); // Adjust the width as needed
                                            $pdf->Cell(0, 10, 'Value', 1, 1, 'C', true);

                                            // Reset fill color for subsequent cells
                                            $pdf->SetFillColor(255, 255, 255); // Reset to white (or any other background color you want)
                
                                            // Client information in a table format
                                            $pdf->SetFont('helvetica', '', 12);

                                            // Nom
                                            $pdf->Cell(40, 10, 'Nom', 1, 0);
                                            $pdf->Cell(0, 10, $facture['nom'], 1, 1);

                                            // Prenom
                                            $pdf->Cell(40, 10, 'Prenom', 1, 0);
                                            $pdf->Cell(0, 10, $facture['prenom'], 1, 1);

                                            // Date Facture
                                            $pdf->Cell(40, 10, 'Date Facture', 1, 0);
                                            $pdf->Cell(0, 10, $facture['date_facture'], 1, 1);

                                            // Status
                                            $pdf->Cell(40, 10, 'Status', 1, 0);
                                            $pdf->Cell(0, 10, $facture['Status'], 1, 1);

                                            // Prix
                                            $pdf->Cell(40, 10, 'Prix', 1, 0);
                                            $pdf->Cell(0, 10, $prix . ' DH', 1, 1);

                                            // Consommation
                                            $pdf->Cell(40, 10, 'Consommation', 1, 0);
                                            $pdf->Cell(0, 10, $facture['Consommation'] . ' KW', 1, 1);

                                            // Add a line to separate content
                                            $pdf->SetLineWidth(0.5);
                                            $pdf->SetDrawColor(0, 0, 0);
                                            $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

                                            // Add a thank you message or any additional content
                                            $pdf->Ln(10);
                                            $pdf->SetFont('helvetica', 'I', 12);
                                            $pdf->Cell(0, 10, 'Thank you for your trusting!', 0, 1, 'C');






                                            $pdfPath = __DIR__ . '/pdf/facture_' . $facture['id_facture'] . '.pdf';


                                            // Update the facture table with the PDF file path
                                            $updateStmt = $conn->prepare('UPDATE facture SET pdf = :pdf, Status = "non payee" , prix= :prix WHERE id_facture = :id_facture AND Status = "en_attente"');
                                            $updateStmt->bindParam(':pdf', $pdfPath);
                                            $updateStmt->bindParam(':prix', $prix);
                                            $updateStmt->bindParam(':id_facture', $facture['id_facture']);
                                            $updateStmt->execute();
                                            $updateStmt1 = $conn->prepare('UPDATE facture SET Consommation = :difference WHERE id_facture = :id_facture');
                                            $updateStmt1->bindParam(':difference', $difference);
                                            $updateStmt1->bindParam(':id_facture', $existingEntry['id_facture']);
                                            $updateStmt1->execute();
                                        }
                                    }
                                    $pdf->Output($pdfPath, 'F');


                                }
                            }
                        }

                    }



                    // Display the facture table
                    $stmt = $conn->query("SELECT * FROM facture where id_client = $id");
                    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);


                    echo '<form method="post" action="">
                    <button type="submit" name="telecharger" class="btn btn-outline-secondary">generate</button>
                  </form>';

                    if (isset($_POST['telecharger'])) {
                        echo '<div class="table-responsive">';
                        echo '<table class=" table table-striped  mt-4" id="clientsTable">
                            <thead>
                                <tr>
                                    <th>Numero du Facture</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';

                        foreach ($clients as $client) {
                            echo '<tr>';
                            echo '<td>' . $client['id_facture'] . '</td>';
                            echo '<td>' . $client['Status'] . '</td>';


                            $pdfPath = 'pdf/facture_' . $client['id_facture'] . '.pdf';

                            // Check conditions to decide whether to display the "Telecharger" button
                            if (($client['Consommation'] < 0 || $client['Consommation'] > 100000) && $client['Status'] == 'en_attente') {
                                echo '<td>Facture en cour de traitement</td>'; // Display a message instead of the button
                            } else {
                                // Conditions met, display the "Telecharger" button
                                echo '<td><a href="' . $pdfPath . '" download><button type="button" class="btn btn-outline-secondary">Telecharger</button></a></td>';
                            }
                        }


                        echo '</tbody></table>';
                        echo '</div>';
                    }

                    ?>
                </section>

                <section id="Reclamation">
                    <div class="conso-box">
                        <h2>Reclamation</h2>
                        <form action="" method="post">
                            <label for="Type">Type of Issue:</label>
                            <select id="Type" name="Type" class="form-control mt-2">
                                <option value="Fuite Externe">Fuite Externe</option>
                                <option value="Fuite Interne">Fuite Interne</option>
                                <option value="Facture">Facture</option>
                                <option value="Autre">Autre</option>
                            </select>
                            <br>
                            <div id="autreInputContainer" style="display: none;">
                                <label for="autreIssue">Autre:</label>
                                <input type="text" id="autreIssue" name="autreIssue" class="form-control mt-2">
                            </div>
                            <br>

                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="4" cols="50"
                                placeholder="Enter your message here..." class="form-control mt-2"></textarea>
                            <br>

                            <button type="submit" name="submit" class="btn btn-outline-secondary mx-auto d-block mt-3"
                                onclick="validateReclamation()">Submit</button>
                        </form>

                        <?Php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                            $tmessage = $_POST['message'];
                            $selectedType = $_POST['Type'];
                            $autre = $_POST['autreIssue'];

                            $stmt = $conn->prepare('INSERT INTO Reclamation (id_client, type, message, datesa) VALUES (:id, :type, :message, NOW())');

                            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                            $stmt->bindValue(':type', ($selectedType == 'Autre') ? $autre : $selectedType, PDO::PARAM_STR);
                            $stmt->bindValue(':message', $tmessage, PDO::PARAM_STR);

                            $stmt->execute();
                        }

                        // This script will check the result of the query and display an alert accordingly
                        echo '<script>
            function validateReclamation() {
                if (' . $stmt->rowCount() . ' > 0) {
                    alert("Reclamation submitted successfully.");
                } else {
                    alert("Error submitting Reclamation.");
                }
            }
        </script>';

                        ?>
                    </div>
                </section>

                <section id="Notification">
                    <h2>Notification</h2>
                    <?php
                    $stmt = $conn->query("SELECT * FROM NOTIFICATION where id_client=$id  ORDER BY date_n DESC ");
                    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Output data into the table
                    echo '<table class=" table table-striped  mt-4" id="clientsTable">
                         <thead>
                             <tr>
                                 <th>Objet</th>
                                 <th>Message</th>
                                 <th>Date</th>

                                
                             </tr>
                         </thead>
                         <tbody>';

                    foreach ($clients as $client) {
                        echo '<tr>';
                        echo '<td>' . $client['objet'] . '</td>';
                        echo '<td>' . $client['message'] . '</td>';
                        echo '<td>' . $client['date_n'] . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody></table>';

                    $rowCount = $stmt->rowCount();

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    ?>

            </section>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#Type').change(function () {

                if ($(this).val() === 'Autre') {
                    $('#autreInputContainer').show();
                } else {
                    $('#autreInputContainer').hide();
                }
            });
        });
        $(document).ready(function () {
            $("#search").on("input", function () {
                var value = $(this).val().toLowerCase();
                $(".table tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().includes(value));
                });
            });
        });

        function logout() {
            var confirmLogout = confirm('Are you sure you want to logout?');

            if (confirmLogout) {
                window.location.href = 'Login.php';
            }
    }
    </script>


</body>

</html>