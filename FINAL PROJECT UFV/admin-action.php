<?php
session_start();

$valid_password = 'adminpassword';

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    die('Unauthorized');
}

if (isset($_POST['newsContent'])) {
    $newsContent = $_POST['newsContent'];
    // Save news content to a file or database
    file_put_contents('news.txt', $newsContent);
}

if (isset($_FILES['productImage'])) {
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_FILES['productImage'];

    // Handle file upload
    $target_dir = "../mages/";
    $target_file = $target_dir . basename($productImage["name"]);
    move_uploaded_file($productImage["tmp_name"], $target_file);

    // Save product information to a file or database
    // Example: Save to a simple text file
    $productInfo = "$productName|$productDescription|$target_file\n";
    file_put_contents('products.txt', $productInfo, FILE_APPEND);
}
?>
