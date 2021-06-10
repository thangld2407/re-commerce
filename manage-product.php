<?php
    require_once 'admin-login.php';
    $sql = "SELECT * FROM product";
    if(isset($_POST['search']))
    {
        $keyword = $_POST['keyword'];
        $sql .= " WHERE pName LIKE '%$keyword%' OR sSize LIKE '%$keyword%'";
        $result = qryrun($sql);
        if($result->num_rows == 0)
        {?>
            <script>
                alert ("Product not found");
                window.location.href = "";
            </script>
        <?php }
    }
    
    $result = qryrun($sql);
?>
<br><br><br><br><br>
<head>
    <link rel="stylesheet" type="text/css" href="css/manage-product.css">
    <script src="js/confirm.js"></script>
</head>
<body>
    
    <center>
        <div class = "search button">
            <form action="" method="post">
                
                    <legend>SEARCH PRODUCT</legend>
                    <input type="text" name="keyword" id="" placeholder="Input nameproduct ">
                    <input type="submit" name="search" value="Search" id="">
            </form>
        </div>
        <table border = "0"  style="width:90%; height: 30%">
            <tr bgcolor = "#bcd3f7">
                <td class = "sizeof">PRODUCT ID</td>
                <td class = "sizeof">NAME</td>
                <td class = "sizeof">IMAGE</td>
                <td class = "sizeof">CATEGORY</td>
                <td class = "sizeof">DETAIL</td>
                <td class = "sizeof">TRADEMARK</td>
                <td class = "sizeof">PRICE</td>
                <td class = "sizeof">MADE IN</td>
                <td class = "sizeof">OPTION</td>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result)){
            ?>
            <tr bgcolor = "#e7ffb0">
                <td align = "center"> <font> <?=$row[0] ?> </font></td>
                <td align = "center"> <font> <?=$row['pName']?> </font></td>
                <td><img src="image/<?=$row['pImage'] ?>" width="150px" height="225px" align= "center" ></td>
                <?php
                    $sql1 = "SELECT * FROM category";
                    $result1 = $connection -> query($sql1);
                    while ($row1 = mysqli_fetch_array($result1))
                    {
                    if($row1['cID'] == $row['cID'])
                        {
                            $ctg = $row1['cName'];
                        }
                    }
                ?>
                <td align = "center"> <font><?= $ctg ?></font> </td>
                <td align="center">
                 <font>   <?=$row['pDetail'] ?> </font>
                </td>
                <td  align = "center"> <font><?=$row['sSize'] ?></font> </td>
                <td align = "center"> <font><?=$row['pPrice'] ?></font></td>
                <td align="center"> <?=$row['made_in']?></td>
                <td>
                    <form class = "frm" action="update-product.php" >
                        <input type="hidden" name = "id"  value="<?=$row[0]?>"><br><br>
                        <input class = "sizeof" type="submit" value="Update" > <br>
                    </form>
                    <form  class = "frm" action="delete-product.php" onsubmit="return confirmDelete()">
                        <input type="hidden" name = "id" value="<?=$row[0]?>"><br><br>
                        <input  class = "sizeof" type="submit" value="Delete"> 
                    </form>
                </td>
        
         <?php }?>
        </table>
    </center>
</body>
           