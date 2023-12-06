function confirmAction(action) {
    // Display a confirmation dialog
    var result = window.confirm("Are you sure you want to perform this action: " + action + " ?");

    // Check the result
    if (result) {
        location.reload();
        alert(action + " confirmed!");
        // Perform the action here
    } else {
        location.reload();
        alert(action + " canceled.");
        // Handle the cancellation or do nothing
    }

    return result;
}

function goBack() {
    // Use window.history to navigate back
    window.history.go(-1);
}