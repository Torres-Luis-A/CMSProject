<?php include_once('header.php'); ?>
<?php
// Check if the delete_title parameter exists in the POST request
if (isset($_POST['delete_title'])) {
    $delete_title = $_POST['delete_title'];

    // Connect to the database
    $servername = "localhost";
    $username = "cdlwebde_torres";
    $password = "";
    $dbname = "cdlwebde_Torres";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement
    $sql = "DELETE FROM artwork WHERE arttitle = ?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $delete_title);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // If delete_title parameter is not set, redirect to another page or display an error message
    echo "Delete title parameter is not set";
}
?>
