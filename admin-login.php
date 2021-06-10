<?php 
require_once "dbconnect.php";
require_once "check-login.php";
?>
<html>

<head>
    <title>MANAGE SHOP </title>
    <meta name = "viewport" content="width=device-width, intitial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/admin-login.css">
    <script src="js/script.js"></script>
</head>

<body>
    <div id = "menu-admin">
            <ul  class = "show-menu-admin">
                <li><a href="home-admin.php" >Home</a></li>
                <li><a href="manage-product.php">Manage Product</a>
                    <ul class = "sub-menu-admin">
                        <li><a href="add-product.php">Add Product</a></li>
                    </ul>
                </li>
                <li><a href="manage-category.php">Manage Category</a>
                    <ul class = "sub-menu-admin">
                        <li><a href="add-category.php">Add Category</a></li>
                    </ul>
                </li>
                <li><a href="home.php" target="_blank">Home Page</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
    </div>
</body>

</htmL>