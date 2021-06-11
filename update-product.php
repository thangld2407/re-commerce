<?php
    require_once "admin-login.php";
    $id = $_GET['id']; ///method POST
    $qry = "SELECT * FROM product WHERE pID = '$id' ";
    $result = $connection -> query($qry);
    $row = mysqli_fetch_array($result);
    $name = $row['pName'];
    $image = $row['pImage'];
    $ctg = $row['cID'];
    $detail = $row['pDetail'];
    $trademark = $row['sSize'];
    $price = $row['pPrice'];
    if(isset($_POST['update'])) //POST -> GET
    { 
        $idP = $_GET['id'];
        $name = $_POST['name'];
        $image = "";
        $ctg = $_POST['ctg'];
        $detail = $_POST['detail'];
        $trademark = $_POST['trademark'];
        $price = $_POST['price'];
        $madein = $_POST['made'];
        if(isset($_FILES['image']) && $_FILES['image']['size'] != 0)
        {
            $temp_name = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $parts = explode(".",$img_name);
            $lastIndex = count($parts) -1;
            $extension = $parts[$lastIndex];
            $image = $name. "_". $ctg . "_" . $trademark . "." . $extension;
            $img_url = $_SERVER['DOCUMENT_ROOT']."/codeofasm/image/";
            $destination = $img_url.$image;
            move_uploaded_file($temp_name,$destination);
        }
        else
        {
            $image = $row['pImage'];            
        }
        $queryupdate = "UPDATE product SET pName = '$name' , pImage = '$image', cID = '$ctg', pDetail = '$detail' , sSize = '$trademark',pPrice = '$price',made_in = '$madein' WHERE pID ='$id' ";
        $rs = $connection -> query($queryupdate);
        if($rs)
        {?>
            <script>
                alert("Successfully Update");
                window.location.href = "manage-product.php";
            </script>
        <?php } else
        {?>
            <script>
                alert("update failed, check again!");
                window.location.href = "update-product.php";
            </script>    
       <?php }
    } ?>
    <head>
        <link rel="stylesheet" type="text/css" href="css/update-product.css">
    </head>
<center>
    <form action="" method="POST" enctype="multipart/form-data" id = "frm-update">
        <legend>UPDATE PRODUCT</legend>
        <?php
            $sqlP = "SELECT * FROM product WHERE pID = '$id'";
            $runP = $connection -> query($sqlP);
            $row2 = mysqli_fetch_array($runP);
        ?>
        
        Name: <input type="text" name = "name" value="<?=$row2['pName'] ?>" size="40" required>
        <br><br>
        <font> Image: <img src="image\<?=$row2['pImage'] ?>" width="150px" height="225px" alt=""> </font>
        <br>
        <input type="file" name="image"><br><br>
        Category: 
        <?php
            $sqlctg = "SELECT * FROM category";
            $runctg = $connection -> query($sqlctg);
        ?>
        <select name="ctg" >
           <?php
           while($row1 = mysqli_fetch_array($runctg))
           {
                if($row1['cID'] == $ctg)
                {?>
                    <option value="<?=$ctg ?>" selected> <?= $row1['cName'] ?></option>
                <?php } else{?>
                    <option value="<?=$row1['cID'] ?>"> <?=$row1['cName'] ?></option>
                <?php } } ?>    
        </select>
        <br><br>
        Detail: <input type="text" name ="detail" value ="<?=$row2['pDetail']?>" size="40"required>
        <br><br>
        Trademark: <input type="text" name = "trademark" value="<?=$row2['sSize'] ?>" size="40"required>
        <br><br>
        Price: <input type="text" name="price" value="<?=$row2['pPrice'] ?>" size="40" required>
        <br><br>
        <input type="submit" name="update" value="UPDATE">

    </form>
</center>