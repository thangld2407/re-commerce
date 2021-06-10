<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUCCI - BRAND OF INTERNATIONAL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
    <table width = "100%" border="0" cellspacing = "0" cellpadding = "0" align="center">
        <tr>
            <td colspan="2">
                <table width = "100%" cellspacing = "0" cellpadding = "0">
                    <tr>
                        <td width = "150px"><a href="home.php"><img src="image/logo.jpg" alt=""></a></td>
                        <td>
                            <h1 align = "center" >
                               <font color = "#ff6666" > <b> BRAND OF INTERNATIONAL STATURE <br> Online Shopping  </b> </font>
                            </h1>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div class = "nav-bar">
        <div id = "menu">
            <ul class="show-nav">
                <li>
                <a href="home.php">HOME</a>
                </li>
                <li>
                    <a href="#">CATEGORY</a>
                    <ul class="sub-menu">
                        <?php
                            include_once  "dbconnect.php";
                            $sub = "SELECT * FROM category";
                            $run = $connection -> query($sub);
                            while($submenu = mysqli_fetch_array($run))
                            {?>
                            <li><a href="category-detail.php?Category=<?=$submenu['cID'] ?>"> <?=$submenu['cName']?> </a></li>
                            <?php
                            }
                        ?>
                    </ul>
                </li>
                <li>
                    <a href="https://www.facebook.com/Le.Dinh.Thang.BN" target="_blank">CONTACT ME</a>
                </li>
                <li>
                    <a href="login.php">LOGIN</a>
                </li>
            </ul>
        </div>   
    </div>

<div id = "themes">
    <center>
        <div class = "content-themes">
            <ul>
                <li><h3>PRODUCT</h3></li>
            </ul>
        </div>       
    <br>
    <div class = "list-product">
        <?php
            $sql = "SELECT * FROM product";
            $rs = $connection -> query($sql);
            while ($product1 = mysqli_fetch_array($rs)){
                ?>
                <div class = "product">
                    <div class = "product-image">
                        <a href= "product-detail.php?ProductID=<?=$product1['pID'] ?>">
                        <img src="image\<?=$product1['pImage']?>">
                    </a>
                    </div><br>
                    <div class = "product-infor">
                        <a href="product-detail.php">
                        <h3> <?=$product1['pName'] ?> </h3>
                        <h4>PRICE:  <?=$product1['pPrice'] ?> $  </h4>
                        </a>
                    </div>
                </div>
        <?php 
    } ?>
    </div>
    </center>
</div>
<br>
<div id = "footer">
    <center>
            <h4>COPY RIGHT BY THANG</h4>
     </center>
    </div>
</body>
<br>
</html> 