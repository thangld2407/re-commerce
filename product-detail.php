
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT DETAIL</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> 
    <link rel="stylesheet" href="css/detail.css">
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
                    <a href="#product">PRODUCT</a>
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
        <div class = "content-themes">
            <ul>
                <li><h3>PRODUCT DETAIL</h3></li>
            </ul>
        </div>       
    <br>
    <div id = "list-product-content">
        <?php
        include_once('dbconnect.php');
            if(isset($_GET['ProductID'])){
                $pID = $_GET['ProductID'];
                $qry = "SELECT product.pID, product.pName, product.pImage, product.pDetail, product.sSize, product.pPrice, category.cName FROM product INNER JOIN category ON product.cID = category.cID WHERE pID = '$pID'";
                $result = qryrun($qry);
                while($row = mysqli_fetch_array($result))
                {?>
                    <div id="detail">
                        <div id="detail-left">
                            <img src="image\<?= $row['pImage'] ?>" alt="">
                        </div>
                        <div id="detail-right">
                            <div id="crop">
                            <h2>Name: <?= $row['pName'] ?></h2>
                            <h2>Catarogy: <?= $row['cName'] ?></h2>
                            <h2>Branch: <?= $row['sSize'] ?></h2>
                            <h2>Detail: <?= $row['pDetail'] ?></h2>                            
                            <h2>Price: <?= $row['pPrice'] ?>$</h2>
                            </div>
                        </div>
                    </div>
                <?php
                }
            }
        ?>
    </div>
    <br>
    <div id = "footer">
            <center>
            <h4>COPY RIGHT BY THANG</h4>
            </center>
    </div>
</body>
</html> 