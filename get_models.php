<?php

    require('params.php');

    $conn = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Simulated models data based on selected brand
    $brand = $_POST['brand']; // Get the selected brand from AJAX POST data


    $sql = "SELECT model FROM model WHERE brand LIKE '$brand' GROUP BY model";
    $result = $conn->query($sql);
    while ($myrow = $result->fetch_object()) {
        $models[] = $myrow->model;
    }
    // Return the models as JSON response
    header('Content-Type: application/json');
    echo json_encode($models);
    
?>