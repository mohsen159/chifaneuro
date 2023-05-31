function handleDateChange() {
    // Get the selected date value
    var dateValue = document.getElementById('prediction-date').value;

    // Create a FormData object and append the date value
    var formData = new FormData();
    formData.append('end_date', dateValue);

    // Send an AJAX request to the prediction PHP file
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Replace the table body with the new prediction data
            var predictionTableBody = document.getElementById('prediction-table-body');
            predictionTableBody.innerHTML = xhr.responseText;
        }
    };
    xhr.open('POST', 'actions/prediction.php', true);
    xhr.send(formData);
}


// Attach the date input change event listener
var predictionDateInput = document.getElementById('prediction-date');
predictionDateInput.addEventListener('change', handleDateChange);
handleDateChange();
