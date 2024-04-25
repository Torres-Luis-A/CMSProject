<?php
// Check if the form is submitted and the required fields are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['old_title'])) {
    $old_title = $_POST['old_title'];

    // Connect to the database
    $servername = "localhost";
    $username = "cdlwebde_torres";
    $password = "WSD2024!";
    $dbname = "cdlwebde_Torres";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Initialize variables to store new values
    $update_fields = array();
    $types = '';
    $params = array();

    // Build the update query dynamically based on the fields provided in the form
    if (!empty($_POST['new_title'])) {
        $update_fields[] = 'arttitle=?';
        $types .= 's';
        $params[] = $_POST['new_title'];
    }
    if (!empty($_POST['new_description'])) {
        $update_fields[] = 'artdesc=?';
        $types .= 's';
        $params[] = $_POST['new_description'];
    }
    if (!empty($_POST['new_artist'])) {
        $update_fields[] = 'artauthor=?';
        $types .= 's';
        $params[] = $_POST['new_artist'];
    }
    if (!empty($_POST['new_email'])) {
        $update_fields[] = 'artauthorcontact=?';
        $types .= 's';
        $params[] = $_POST['new_email'];
    }
    if (!empty($_POST['new_price'])) {
        $update_fields[] = 'artprice=?';
        $types .= 'd';
        $params[] = $_POST['new_price'];
    }

    // Prepare SQL statement only if there are fields to update
    if (!empty($update_fields)) {
        // Construct the SQL statement
        $sql = "UPDATE artwork SET " . implode(", ", $update_fields) . " WHERE arttitle=?";

        // Prepare the statement
        $stmt = mysqli_prepare($conn, $sql);

        // Check if preparation of statement was successful
        if ($stmt) {
            // Bind parameters
            $bindParams = array_merge(array($types), $params, array($old_title));
            mysqli_stmt_bind_param($stmt, ...$bindParams);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
                error_log("Error executing statement: " . mysqli_error($conn));
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
            error_log("Error preparing statement: " . mysqli_error($conn));
        }
    } else {
        echo "No fields provided for update";
    }

    // Close connection
    mysqli_close($conn);
} else {
    // If required fields are not set, redirect to another page or display an error message
    echo "Required fields are not set";
}
?>
