document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch prediction data based on the selected date
    function fetchPredictionData(date) {
      // You can make an AJAX request to your server to fetch the prediction data
      // Replace the URL with your actual endpoint to fetch the prediction data
      fetch("fetch_prediction_data.php?date=" + date)
        .then(response => response.json())
        .then(data => {
          // Update the prediction table with the fetched data
          updatePredictionTable(data);
        })
        .catch(error => {
          console.error("Error fetching prediction data:", error);
        });
    }

    // Function to update the prediction table with the fetched data
    function updatePredictionTable(data) {
      const predictionTable = document.querySelector(".prediction-table tbody");
      // Clear the existing table rows
      predictionTable.innerHTML = "";

      // Iterate through the data and create table rows dynamically
      data.forEach(item => {
        const row = document.createElement("tr");
        const medicationCell = document.createElement("td");
        const amountCell = document.createElement("td");

        medicationCell.textContent = item.medication;
        amountCell.textContent = item.amount;

        row.appendChild(medicationCell);
        row.appendChild(amountCell);

        predictionTable.appendChild(row);
      });
    }

    // Event listener for date input change
    const dateInput = document.getElementById("prediction-date");
    dateInput.addEventListener("change", function() {
      const selectedDate = this.value;
      // If the selected date is null, use the default value
      const date = selectedDate ? selectedDate : "<?php echo date('Y-m-d', strtotime('+30 days')); ?>";
      fetchPredictionData(date);
    });

    // Initial fetch of prediction data using the default date value
    fetchPredictionData("<?php echo date('Y-m-d', strtotime('+30 days')); ?>");
  });