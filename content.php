<?php
// Code for displaying data from the database
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

$sql = "SELECT arttitle, artdesc, artauthor, artauthorcontact, artprice FROM artwork";
$result = mysqli_query($conn, $sql);

echo "<table class='artwork-table'>";
echo "<tr><th>Title</th><th>Description</th><th>Artist</th><th>Email</th><th>Price</th><th>Action</th></tr>";

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["arttitle"] . "</td>";
    echo "<td>" . $row["artdesc"] . "</td>";
    echo "<td>" . $row["artauthor"] . "</td>";
    echo "<td>" . $row["artauthorcontact"] . "</td>";
    echo "<td>$" . $row["artprice"] . "</td>";
    echo "<td>
            <form action='delete.php' method='post' onsubmit='return confirmDelete();'>
                <input type='hidden' name='delete_title' value='" . $row["arttitle"] . "'>
                <input type='submit' value='Delete'>
            </form>
            <form action='edit.php' method='post'>
                <input type='hidden' name='title' value='" . $row["arttitle"] . "'>
                <input type='hidden' name='original_title' value='" . $row["arttitle"] . "'>
                <input type='text' name='new_arttitle' placeholder='New Title'><br>
                <textarea name='new_artdesc' placeholder='New Description'></textarea><br>
                <input type='text' name='new_artauthor' placeholder='New Artist'><br>
                <input type='text' name='new_artauthorcontact' placeholder='New Email'><br>
                <input type='text' name='new_artprice' placeholder='New Price'><br>
                <input type='submit' value='Edit'>
            </form>
          </td>";
    echo "</tr>";
   
  }
} else {
  echo "<tr><td colspan='6'>0 results</td></tr>";
}

echo "</table>";

mysqli_close($conn);
?>

<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this item?");
}
</script>
