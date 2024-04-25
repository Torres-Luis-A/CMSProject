
    <?php include_once('header.php'); ?>
    <script>
        function validateForm() {
            var artName = document.getElementById("art_name").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var description = document.getElementById("description").value;
            var artPrice = document.getElementById("artprice").value;

            if (artName == "" || name == "" || email == "" || description == "" || artPrice == "") {
                alert("All fields are required");
                return false;
            }
            return true;
        }
    </script>

    <h2>Submit Your Art</h2>
    <form action="finalformtosql.php" method="post" onsubmit="return validateForm()">
        <label for="art_name">Name of Your Art:</label><br>
        <input type="text" id="art_name" name="art_name" required><br><br>

        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="description">Tell us something about your piece!</label><br>
        <input type="text" id="description" name="description" required><br><br>

        <label for="artprice">How much would you like for this piece?</label><br>
        <input type="number" min="1" id="artprice" name="artprice" required><br><br>
        
        <input type="submit" value="Submit">
    </form>

<?php include_once('footer.php'); ?>

