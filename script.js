$(document).ready(function() {
  $('#searchForm').submit(function(e) {
    e.preventDefault(); // Prevent form submission
    
    // Gather selected criteria
    var formData = $(this).serialize();
    
    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: 'search.php', // Path to your PHP script
      data: formData,
      dataType: 'json',
      success: function(data) {
        // Update the search results container with received data
        var resultsContainer = $('#searchResults');
        resultsContainer.empty();
        
        // Display each result
        $.each(data, function(index, result) {
          resultsContainer.append('<p>' + result.brand + ' ' + result.model + ' (' + result.year + ')</p>');
        });
      },
      error: function() {
        console.log('Error occurred during AJAX request.');
      }
    });
  });
});
