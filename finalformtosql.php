<?php include_once('header.php'); ?>

<?php
$servername = "localhost";
$username = "cdlwebde_torres";
$password = "WSD2024!";
$dbname = "cdlwebde_Torres";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully: "; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement to insert data into the table
    $stmt = $conn->prepare("INSERT INTO artwork (artauthor,artauthorcontact,artdesc,artprice,arttitle) 
        VALUES (:artauthor, :artauthorcontact, :artdesc, :artprice, :arttitle)");
    
    // Bind parameters
    $stmt->bindParam(':arttitle', $_POST['art_name']);
    $stmt->bindParam(':artauthor', $_POST['name']);
    $stmt->bindParam(':artauthorcontact', $_POST['email']);
    $stmt->bindParam(':artdesc', $_POST['description']);
    $stmt->bindParam(':artprice',$_POST['artprice']);
    
    // Execute the statement
    try {
        $stmt->execute();
        echo "New record inserted successfully";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<?php include_once('footer.php'); ?>
