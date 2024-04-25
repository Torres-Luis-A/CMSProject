<?php include_once('header.php'); ?>

<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $original_title = $_POST["original_title"];
    $new_arttitle = $_POST["new_arttitle"];
    $new_artdesc = $_POST["new_artdesc"];
    $new_artauthor = $_POST["new_artauthor"];
    $new_artauthorcontact = $_POST["new_artauthorcontact"];
    $new_artprice = $_POST["new_artprice"];

    // Update the record in the database
    $sql = "UPDATE artwork SET ";
    $updates = array();

    if (!empty($new_arttitle)) {
        $updates[] = "arttitle='$new_arttitle'";
    }
    if (!empty($new_artdesc)) {
        $updates[] = "artdesc='$new_artdesc'";
    }
    if (!empty($new_artauthor)) {
        $updates[] = "artauthor='$new_artauthor'";
    }
    if (!empty($new_artauthorcontact)) {
        $updates[] = "artauthorcontact='$new_artauthorcontact'";
    }
    if (!empty($new_artprice)) {
        $updates[] = "artprice='$new_artprice'";
    }

    $sql .= implode(", ", $updates);
    $sql .= " WHERE arttitle='$original_title'";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success'>Record updated successfully</div>";
    } else {
        echo "<div class='error'>Error updating record: " . mysqli_error($conn) . "</div>";
    }
}

mysqli_close($conn);
?>
