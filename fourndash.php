<?php 
session_start();
$_SESSION["id_four"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;

            overflow: hidden;
        }
        .table-responsive {
    max-height: 400px; /* Set a maximum height for the table container */
    overflow: auto; /* Enable scroll bar if the content exceeds the container height */
}

        .conso-box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 400px;
            padding: 15px;
            height: 400px;

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
        h2 {
            color: #A8AF8A;
            text-align: center;
            margin-bottom: 20px;
            font-size: px;
        }

        .conso-box h2 {
            color: #A8AF8A;
            text-align: center;
            margin-bottom: 20px;
            font-size: px;
        }

        section {
            margin-bottom: 2rem;
            padding: 100px 250px;
            margin-top: 2rem;
        }

        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Align items to the start on the main axis */
            width: 100%;
            height: 100%;
        }

        label {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
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

        h1 {
            margin-left: 4rem;
            color: black;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            background-color: #9c9d97;
            height: 100%;
            padding: 10px;
            box-sizing: border-box;
            position: fixed;
            align-items: center;
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
            align-items: center;
            top: 0;
            left: 0;
        }

        /*.dashboard-button:hover,
.dashboard-button:focus {
    background-color: black;
}*/
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
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        button i {
            width: 34px;
            font-size: 25px;

        }

        .parent {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
       
            grid-column-gap: 20px;
            grid-row-gap: 20px;
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
    <div class="dashboard-container">


        <div class="buttons-container">

            <img src="img/Screenshot_2024-02-21_221710-removebg-preview (1).png" alt="//" width="160px">
            <button class="dashboard-button"> <i class="fa-solid fa-user"></i><a href="#Dashbord">Dashbord</a></button>
            <button class="dashboard-button"><i class="fa-solid fa-people-roof"></i><a
                    href="#GererClients">Gérer</a></button>
            <button class="dashboard-button"><a href="#Reaclamation"><i
                        class="fa-solid fa-comments"></i>Reaclamation</a></button>
            <button class="dashboard-button"><a href="#Consomation"><i class="fa-solid fa-pen">
                    </i>Consomation</a></button>
            <button class="dashboard-button"><a href="#ConsommatAnnuelle"><i
                        class="fa-solid fa-money-bill-trend-up"></i>C.annuelle</a></button>
            <span class="logout-icon" onclick="logout()"><i class="fa-solid fa-right-from-bracket">Logout</i></span>

        </div>

        <!-- Other dashboard components -->
        <main>
            <section id="Dashbord">
                <div class="parent">
                    <div class="div1"> 
                        <h2>Bienvenue</h2>
                        
                    </div>
                    <div class="div2"> 
                        <fieldset>Factures
                    <canvas id="myChart" width="300" height="200"></canvas>
                    </fieldset>
                    <?php

try {
        $host = 'localhost';
    $dbname = 'gestionclfr';
    $username = 'root';
    $password = '';
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $queryPayee = $conn->query("SELECT COUNT(*) AS count FROM facture WHERE Status = 'payee'");
    $countPayee = $queryPayee->fetchColumn();

    $queryNonPayee = $conn->query("SELECT COUNT(*) AS count FROM facture WHERE Status = 'non payee'");
    $countNonPayee = $queryNonPayee->fetchColumn();

    $data = [
        'labels' => ['facture payée', ' facture non payée'],
        'datasets' => [
            [
                'data' => [$countPayee, $countNonPayee],
                'backgroundColor' => ['#7289da', '#99aab5'],
            ],
        ],
    ];

    // Encode data to JSON for JavaScript usage
    $jsonData = json_encode($data);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Use PHP data in JavaScript
    var data = <?php echo $jsonData; ?>;

    // Get the context of the canvas element
    var ctx = document.getElementById('myChart').getContext('2d');

    // Create the pie chart
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
});
</script>

                    </div>
                    <div class="div3">
                        <fieldset>Consommation
                    <canvas id="consumptionChart" width="500" height="400"></canvas>
                    </fieldset>
                    <?php
// Assuming you have a PDO connection established
$host = 'localhost';
$dbname = 'gestionclfr';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to get consumption data
    $query = $conn->query("SELECT dateM, Consommation FROM consommation");
    $consumptionData = $query->fetchAll(PDO::FETCH_ASSOC);

    // Prepare data
    $labels = [];
    $consumptionValues = [];

    foreach ($consumptionData as $data) {
        $labels[] = $data['dateM'];
        $consumptionValues[] = $data['Consommation'];
    }

    $data = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Consommation',
                'data' => $consumptionValues,
                'fill' => false,
                'borderColor' => '#36a2eb',
                'lineTension' => 0.1,
            ],
        ],
    ];

    // Encode data to JSON for JavaScript usage
    $jsonData = json_encode($data);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Use PHP data in JavaScript
    var data = <?php echo $jsonData; ?>;

    // Get the context of the canvas element
    var ctx = document.getElementById('consumptionChart').getContext('2d');

    // Create the line chart
    var consumptionChart = new Chart(ctx, {
        type: 'bar',
        data: data,
    });
});
</script>

                
                </div>
                </div>
            </section>
            <section id="GererClients" class="mb-4">
                <div class="input-group">

                    <label for="search" class="visually-hidden">Search:</label>
                    <span class="input-group-text bg-primary text-light"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Search...">
                    <a href="ajouter.php"><button type="button"
                            class="btn btn-outline-primary ms-2">Ajouter</button></a>
                </div>

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

                    // Fetch data from the 'client' table
                    $stmt = $conn->query("SELECT * FROM client");
                    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Output data into the table
                    echo '<div class="table-responsive">';
                    echo '<table class=" table table-striped  mt-4" id="clientsTable">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Adresse</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>';

                    foreach ($clients as $client) {
                        echo '<tr>';
                        echo '<td>' . $client['nom'] . '</td>';
                        echo '<td>' . $client['prenom'] . '</td>';
                        echo '<td>' . $client['adresse'] . '</td>';
                        echo '<td><a href="modify.php?id=' . $client['id_client'] . '"><button type="button" class="btn btn-outline-secondary">Modify</button></a></td>'; // You need to replace this with actual actions
                        echo '</tr>';
                    }

                    echo '</tbody></table>';

                    echo '</div>';
                    ?>



                </section>

                <section id="Reaclamation" class="mb-4">
                    <div class="input-group mb-3">
                        <label for="search" class="visually-hidden">Search:</label>
                        <span class="input-group-text bg-primary text-light"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" id="search" placeholder="Search...">
                    </div>
                    <?php
                    $stmt = $conn->query("SELECT * FROM reclamation");
                    $recs = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    echo '<table class="table  table-striped  mt-4" id="clientsTable">
            <thead>
                <tr>
                    <th>Reclamation Type</th>
                    <th>Numero Client</th>
                    <th>Message</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>';

                    foreach ($recs as $rec) {
                        echo '<tr>';
                        echo '<td>' . $rec['type'] . '</td>';
                        echo '<td>' . $rec['id_client'] . '</td>';
                        echo '<td>' . $rec['message'] . '</td>';
                        echo '<td><a href="feedback.php?id=' . $rec['id_client'] . '&id_reclamation=' . $rec['id_reclamation'] . '"><button type="button" class="btn btn-outline-primary">Feedback</button></a></td>'; // You need to replace this with actual actions
                        echo '</tr>';
                    }

                    echo '</tbody></table>';
                    ?>
                </section>

                <section id="Consomation">
                    <?php


                    $stmt = $conn->query("SELECT c.dateM, f.id_client, c.image , c.Consommation ,f.date_facture
                                       FROM facture f
                                       INNER JOIN consommation c ON c.id_client = f.id_client 
                                       WHERE f.Consommation <= 0  and f.date_facture= dateM");

                    $anomalies = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $stmt = $conn->query("SELECT * FROM consommation WHERE LENGTH(Consommation) > 6 ");
                    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Combine anomalies and clients for a single loop
                    $data = array_merge($clients, $anomalies);

                    // Output data into the table
                    echo '<table class=" table table-striped  mt-4" id="clientsTable">
                          <thead>
                              <tr>
                                  <th>DATE</th>
                                  <th>Consommation</th>
                                  <th>Image</th>
                                  <th>Modifer</th>
                              </tr>
                          </thead>
                          <tbody>';

                    foreach ($data as $entry) {
                        echo '<tr>';
                        echo '<td>' . $entry['dateM'] . '</td>';
                        echo '<td>' . $entry['Consommation'] . '</td>';
                        echo '<td><img src="img/' . $entry['image'] . '" alt="Client Image" style="max-width: 100px; max-height: 100px;"></td>';
                        echo '<td>';
                        echo '<form action="" method="post">';
                        echo '<div class="row">';
                        echo '<div class="col">';
                        echo '<input type="text" class="form-control" name="newValue">';
                        echo '</div>';
                        echo '<div class="col">';
                        echo '<input type="text" class="form-control" name="newDate" value="' . $entry['dateM'] . '" readonly>';
                        echo '</div>';
                        echo '<div class="col">';
                        echo '<button type="submit" class="btn btn-outline-secondary" name="modifyBtn" value="' . $entry['id_client'] . '">Modify</button>';
                        echo '</div>';
                        echo '</div>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';

                        if (isset($_POST['modifyBtn'])) {
                            $clientId = $_POST['modifyBtn'];
                            $newValue = $_POST['newValue'];
                            $newDate = isset($_POST['newDate']) ? $_POST['newDate'] : '';

                            $stmt = $conn->prepare("UPDATE consommation SET Consommation = :newValue WHERE id_client = :clientId AND dateM = :datem");
                            $stmt->bindParam(':newValue', $newValue);
                            $stmt->bindParam(':clientId', $clientId);
                            $stmt->bindParam(':datem', $newDate);
                            $stmt->execute();

                        }
                    }

                    echo '</tbody></table>';



                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                }








                ?>
            </section>
            <section id="ConsommatAnnuelle">
<form action="" method="post">
<input type="submit" name="submit" value="Read and Insert" class="btn btn-outline-secondary">

</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
   
$filename = 'Consommation_annuuelle.txt';

$fileContent = file_get_contents($filename);

$lines = explode("\n", $fileContent);

$data = array();
$dataArray = array();
$data = array();
foreach ($lines as $line) {
    // Skip empty lines
    if (empty($line)) {
        continue;
    }

    // Split the line into key and value
    $pair = array_map('trim', explode(':', $line, 2));

    // Check if the split produced a valid key-value pair
    if (count($pair) === 2) {
        list($key, $value) = $pair;
        // Add key-value pair to the data array
        $data[$key] = $value;
    }

    // Check if id_client is set in the data array
    if (isset($data['id_client']) && isset($data['annee']) && isset($data['Consommation']) && isset($data['id_consommation']) && isset($data['date_s'])) {
        
       
        
        $dataArray[] = $data;
        $sqlCheckDuplicate = "SELECT id_client FROM consommation_annulle WHERE id_client = :id_client AND annee = :annee";
        $stmtCheckDuplicate = $conn->prepare($sqlCheckDuplicate);
        $stmtCheckDuplicate->bindParam(':id_client', $data['id_client']);
        $stmtCheckDuplicate->bindParam(':annee', $data['annee']);
        $stmtCheckDuplicate->execute();

        if ($stmtCheckDuplicate->rowCount() > 0) {
            echo '';
        } else {
            $sqlInsert = "INSERT INTO consommation_annulle (id_client, annee, Consommation, id_consommation, date_s) 
            VALUES (:id_client, :annee, :Consommation, :id_consommation, :date_s)";
$stmtInsert = $conn->prepare($sqlInsert);
$stmtInsert->bindParam(':id_client', $data['id_client']);
$stmtInsert->bindParam(':annee', $data['annee']);
$stmtInsert->bindParam(':Consommation', $data['Consommation']);
$stmtInsert->bindParam(':id_consommation', $data['id_consommation']);
$stmtInsert->bindParam(':date_s', $data['date_s']);
$result = $stmtInsert->execute();

            if ($result) {
                echo 'Data inserted successfully.';
            } else {
                echo 'Error inserting data: ' . $stmtInsert->errorInfo()[2];
            }
        }

        $data = array();
    }
    }



      
       

    $stmtConsommationAnnuelle = $conn->query("SELECT id_client, Consommation, annee, date_s FROM consommation_annulle");
    $consommationAnnuelleData = $stmtConsommationAnnuelle->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped mt-4" id="clientsTable">
    <thead>
        <tr>
            <th>Annee</th>
            <th>Consommation Calculée</th>
            <th>Consommation</th>
            <th>Difference</th>
            <th>id_client</th>
            <th>date_saisie</th>
            <th>feedBack</th>
        </tr>
    </thead>
    <tbody>';
    foreach ($consommationAnnuelleData as $consommation) {
        $id = $consommation['id_client'];
        $annee = $consommation['annee'];

        // Retrieve data from "consommation" table for the specific id_client and month
        $stmtConsommation = $conn->prepare("SELECT Consommation as totalConsommation FROM consommation WHERE MONTH(dateM) = 12 AND id_client = :id AND YEAR(dateM) = :annee");
        $stmtConsommation->bindParam(':id', $id);
        $stmtConsommation->bindParam(':annee', $annee);
        $stmtConsommation->execute();
        $consommationData = $stmtConsommation->fetch(PDO::FETCH_ASSOC);

        // Check if $consommationData is an array
        if (is_array($consommationData)) {
            // Calculate the difference
            $difference = $consommation['Consommation'] - $consommationData['totalConsommation'];

            echo '<tr>
                    <td>' . $consommation['annee'] . '</td>
                    <td>' . $consommation['Consommation'] . '</td>
                    <td>' . $consommationData['totalConsommation'] . '</td>
                    <td>' . $difference . '</td>
                    <td>' . $consommation['id_client'] . '</td>
                    <td>' . $consommation['date_s'] . '</td>
                    <td><a href="feedback.php">
                    <button type="button" class="btn btn-outline-primary">Feedback</button></a></td>

                </tr>';
        } else {
            // Handle the case where no matching record is found
            echo '<tr>
                    <td>' . $consommation['annee'] . '</td>
                    <td>' . $consommation['Consommation'] . '</td>
                    <td>N/A</td>
                    <td>N/A</td>
                    <td>' . $consommation['id_client'] . '</td>
                    <td>' . $consommation['date_s'] . '</td>
                </tr>';
        }
    }

    echo '</tbody></table>';
    echo '</div>'; 

}
?>


            
            </section>
        </main>
    </div>

    <script>
        function logout() {
            alert('are you sure you wanna to logout?');
            window.location.href = 'Login.php';
        }

        $(document).ready(function () {
            $("#search").on("input", function () {
                var value = $(this).val().toLowerCase();
                $(".table tbody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().includes(value));
                });
            });
        });
    </script>
</body>

</html>