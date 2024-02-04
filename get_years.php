<?

    require('params.php');

    $conn = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $model = $_POST['model']; // Get the selected model from AJAX POST data


    $sql = "SELECT year FROM model WHERE model LIKE '$model' GROUP BY year";
    $result = $conn->query($sql);
    while ($myrow = $result->fetch_object()) {
        $years[] = $myrow->year;
    }

    // Return the models as JSON response
    header('Content-Type: application/json');
    echo json_encode($years);
    
?>