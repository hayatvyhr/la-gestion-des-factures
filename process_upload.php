            
<?php

$filename = 'Consommation_annuuelle.txt';

$fileContent = file_get_contents($filename);

$lines = explode("\n", $fileContent);

$data = array();

// Process each line and extract key-value pairs
// Process each line and extract key-value pairs
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

}


$sql = "INSERT INTO  consommation_annulle (id_client, annee, Consommation, id_consommation, date_s) 
        VALUES (:id_client, :annee, :Consommation, :id_consommation, :date_s)";
$stmt = $conn->prepare($sql);

// Bind parameters
$stmt->bindParam(':id_client', $data['id_client']);
$stmt->bindParam(':annee', $data['annee']);
$stmt->bindParam(':Consommation', $data['Consommation']);
$stmt->bindParam(':id_consommation', $data['id_consommation']);

// Check if 'date_s' is set in $data before binding
if (isset($data['date_s'])) {
    $stmt->bindParam(':date_s', $data['date_s']);
} else {
    // Handle the case where 'date_s' is missing
    echo 'Error: "date_s" key is missing in the file.';
    exit; // You might want to handle this error more gracefully based on your application's logic.
}

$result = $stmt->execute();

if ($result) {
    echo 'Data inserted successfully.';
} else {
    echo 'Error inserting data: ' . $stmt->errorInfo()[2];
}
// Retrieve data from "consommation" ta
// Retrieve data from "consommation_annuelle" table
$stmtConsommationAnnuelle = $conn->query("SELECT id_client, Consommation, annee, date_s FROM consommation_annulle");
$consommationAnnuelleData = $stmtConsommationAnnuelle->fetchAll(PDO::FETCH_ASSOC);

echo '<table class="table table-striped mt-4" id="clientsTable">
      <thead>
          <tr>
              <th>Annee</th>
              <th>Consommation Calculée</th>
              <th>Consommation</th>
              <th>Difference</th>
              <th>id_client</th>
              <th>date_saisie</th>
          </tr>
      </thead>
      <tbody>';

foreach ($consommationAnnuelleData as $consommation) {
    $id = $consommation['id_client'];

    // Retrieve data from "consommation" table for the specific id_client
    $stmtConsommation = $conn->prepare("SELECT Consommation, dateM FROM consommation WHERE MONTH(dateM) = 12 AND id_client = :id");
    $stmtConsommation->bindParam(':id', $id);
    $stmtConsommation->execute();
    $consommationData = $stmtConsommation->fetchAll(PDO::FETCH_ASSOC);

    foreach ($consommationData as $consommationDataItem) {
        $difference = $consommation['Consommation'] - $consommationDataItem['Consommation'];

        echo '<tr>
                  <td>' . $consommation['annee'] . '</td>
                  <td>' . $consommation['Consommation'] . '</td>
                  <td>' . $consommationDataItem['Consommation'] . '</td>
                  <td>' . $difference . '</td>
                  <td>' . $consommation['id_client'] . '</td>
                  <td>' . $consommation['date_s'] . '</td>
              </tr>';
    }
}

echo '</tbody></table>';
















?>

