<?php
    require_once "admin-login.php";
    if(isset($_POST['add'])){
        $name = $_POST['nameproduct'];
        $ctg = $_POST['ctg'];
        $image = "";
        $detail = $_POST['detail'];
        $size = $_POST['size'];
        $price = $_POST['price'];
        $madein = $_POST['made'];
        if(isset($_FILES['image']) && $_FILES['image']['size'] !=0 )
        {
            $temp_name = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
            $parts = explode(".",$img_name);
            $lastIndex = count($parts)-1;
            $extension = $parts[$lastIndex];
            $image = $ctg . "_" . $size. "_". "." .$extension;
            $img_url = $_SERVER['DOCUMENT_ROOT']. "/codeofasm/image/";
            $destination = $img_url.$image;
            move_uploaded_file($temp_name,$destination);
        }
        $sql = "INSERT INTO product(pName,cID, pImage,pDetail,sSize,pPrice,made_in) VALUES ('$name','$ctg','$image','$detail','$size','$price','$madein')";
        $run = qryrun($sql); 
        if($run){?>
            <script>
        alert("Add product successfully !");
        window.location.href = "manage-product.php";
    </script> 
    <?php } } ?>


<br><br><br>
<head>
    <link rel = "stylesheet" type="text/css" href="css/add-product.css"
</head>
<body>
    <center>
        <form action="" method = "POST" enctype="multipart/form-data" id="f-add">          
                <legend align = "center">ADD PRODUCT</legend>
                <br><br>
                Name <input type="text" name = "nameproduct" size="40" required >
                <br><br>
                <?php
                    $sql = "SELECT * FROM category";
                    $run = qryrun($sql);
                ?>
                Category 
                <select name="ctg" >
                    <?php
                    while($ctg = mysqli_fetch_array($run)){
                        ?>
                        <option value="<?=$ctg['cID'] ?>"> <?=$ctg['cName'] ?>
                        </option>
                    <?php } ?> 
                </select>
                <br><br>
                Image <input type="file" name = "image" accept="image/*" required>
                <br><br>   
                Detail <input type="text" name = "detail" size = "40" required>
                <br><br>
                Trademark <input type="text" name = "size" size="40" required> 
                <br><br>
                Price <input type="text" name="price" size="40" required>
                <br><br>
                Made in: <input type="text" name="made" id=""  size = "40" require>
                <br><br>
                <input type="submit" value="Add New" name = "add" class="btn-add">
        </form>
    </center>
</body>
