<?php
$pageTitle = "The Art Market";

function customPageHeader() {
    echo '<meta name="description" content="Welcome to The Art Market">';
    echo '<link rel="stylesheet" href="https://cdlwebsysdev.esc-atsystems.net/luis_torres235/Finalstyle.css">';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <?php customPageHeader(); ?>
</head>
<body>
    <header>
        <h1><?php echo $pageTitle; ?></h1>
        <?php include_once('nav.php'); ?>
    </header>
