<!DOCTYPE html>
<html>
<head>
  <title>Vehicle Search</title>
  <!-- Include necessary CSS and JavaScript libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php
require_once 'jquery_css.php'
?>
  
  <div class="sas_wrap">
    <form id="searchForm">
      <!-- Brand dropdown -->
      <select name="brand" id="brand">
        <option value="" aria-readonly="true" selected='selected'>Select Brand</option>
        
        <?php
  
          include 'params.php';

          $conn = new mysqli("$dbhost", "$dbuser", "$dbpass", "$dbname");
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM model GROUP BY brand";
          // echo $sql;
          // die();
          $result = $conn->query($sql);
          while ($myrow = $result->fetch_object() ) {
            
            $curr_brand = $myrow->brand; ?>

            <option value="<?= $curr_brand; ?>"><?= $curr_brand; ?></option>

          <? } ?>

      </select>
      
      <!-- Model dropdown -->
      <select name="model" id="model">
        <option value="">Select Model</option>
      </select>
      
      <!-- Year dropdown -->
      <select name="year" id="year">
        <option value="">Select Year</option>
      </select>
      
      <button type="submit">Search</button>
    </form>

    <!-- Container for search results -->
    <div id="searchResults"></div>
  </div>

</body>
</html>
