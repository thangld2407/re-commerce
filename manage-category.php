<?php require_once "admin-login.php";
$sql = "SELECT * FROM category";
$run = qryrun($sql);
?>
<head>
    <script src="js/confirm.js"></script>
    <link rel="stylesheet" href="css/manage-product.css">

</head>
<center>
    <table border = "0" style="width:100%;height: 60%" >
        <tr bgcolor = "#bcd3f7" class = "table-size">
            <td class = "sizeof">ID</td>
            <td class = "sizeof">Name</td>
            <td class = "sizeof">Option</td>
        </tr>
        <?php
            while($row = mysqli_fetch_array($run))
            {
                $id = $row['cID'];
                $name = $row['cName'];
                ?>
                <tr  bgcolor = "#e7ffb0">
                    <td align="center"><?= $id ?></td>
                    <td align="center"><?=$name?></td>
                    <td align="center">
                        <form class = "frm" action="update-category.php" method="POST" >
                            <input type="hidden" name = "categoryid" value="<?=$id ?>">
                            <input class = "sizeof" type="submit" value="Update">
                        </form>
                        <form class = "frm" action="delete-category.php" method="POST" onsubmit="return confirmDelete()">
                            <input type="hidden" name="categoryid" value="<?=$id?>">
                            <input class = "sizeof" type="submit"  value="Delete">
                        </form>
                    </td>
                </tr>
                <?php
            }
        ?>  
    </table>
</center>
