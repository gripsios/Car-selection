    <?php
    // Perform the search and retrieve results from your data source
    // For this example, we'll just simulate results
    // $results = array(
    // array("brand" => "BMW", "model" => "X5", "year" => "2022"),
    // array("brand" => "Mercedes-Benz", "model" => "C-Class", "year" => "2021"),
    // // Add more results here
    // );

    // Return results in JSON format
    // header('Content-Type: application/json');
    // echo json_encode($results);
    ?>


<?

    require('params.php');

    $conn = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Simulated models data based on selected brand
    $brand = $_POST['brand']; // Get the selected brand from AJAX POST data
    $model = $_POST['model']; // Get the selected brand from AJAX POST data
    // echo $model;
    // die();
    
    if(isset($_POST['brand']) && ($_POST['brand']) !='') {
        if($_POST['model'] =='') {
            // $sql = "SELECT model,year FROM model WHERE brand LIKE '$brand' GROUP BY model";
            $sql = "SELECT model,year FROM model WHERE brand LIKE '$brand' ORDER BY model";
            $result = $conn->query($sql);
            echo $_POST['brand'] . ' has these models: <br/><br/>';
            while($myrow = $result->fetch_object()){
                $model = $myrow->model;
                $year = $myrow->year;
                echo $model . ' -> ' . $year . '<br/>';
            }
        } else {
            if(isset($_POST['model']) && ($_POST['model']) !='') {
                $sql = "SELECT year FROM model WHERE model LIKE '$model'";
                $result = $conn->query($sql);
                echo $_POST['brand'] . ' ' . $_POST['model'] . ' has these years: <br/><br/>';
                while($myrow = $result->fetch_object()){
                    $year = $myrow->year;
                    echo $year . '<br/>';
                }
            }
        }    
    } else {
        echo 'Please select a brand';
    }

?>