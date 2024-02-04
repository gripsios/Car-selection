<script>
    
    $(document).ready(function() {
      // Populate model dropdown based on selected brand
      $('#brand').change(function() {
        var selectedBrand = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'get_models.php', // PHP script to fetch models based on brand
          data: { brand: selectedBrand },
          dataType: 'json',
          success: function(data) {
            var modelDropdown = $('#model');
            modelDropdown.empty();
            modelDropdown.append('<option value="">Select Model</option>');
            
            $.each(data, function(index, model) {
              modelDropdown.append('<option value="' + model + '">' + model + '</option>');
            });
          }
        });
      });

      // Similar logic for populating year dropdown based on selected model
      // ...

      $('#model').change(function() {
        var selectedModel = $(this).val();
        $.ajax({
          type: 'POST',
          url: 'get_years.php', // PHP script to fetch models based on brand
          data: { model: selectedModel},
          dataType: 'json',
          success: function(data) {
            var yearDropdown = $('#year');
            yearDropdown.empty();
            yearDropdown.append('<option value="">Select Year</option>');
            
            $.each(data, function(index, year) {
              yearDropdown.append('<option value="' + year + '">' + year + '</option>');
            });
          }
        });
      });
      
    //   $('#searchForm').submit(function(e) {
    //     e.preventDefault();

    //     var formData = $(this).serialize();

    //     $.ajax({
    //       type: 'POST',
    //       url: 'search.php',
    //       data: formData,
    //       dataType: 'json',
    //       success: function(data) {
    //         var resultsContainer = $('#searchResults');
    //         resultsContainer.empty();

    //         $.each(data, function(index, result) {
    //           resultsContainer.append('<p>' + result.brand + ' ' + result.model + ' (' + result.year + ')</p>');
    //         });
    //       },
    //       error: function() {
    //         console.log('Error occurred during AJAX request.');
    //       }
    //     });
    //   });

      $('#searchForm').submit(function(e) {
        e.preventDefault();

        var formdata = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: formdata,
            // dataType: 'json',
            dataType: 'text',
            success: function(data){
                $("#searchResults").html(data);
            }
        });
      });
    });


</script>