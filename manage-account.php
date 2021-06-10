<?php
    require_once ('admin-login.php');
    $qry = "SELECT * FROM user";
    $rs = qryrun($qry);
?>
<head>
    <script src="js/confirm.js"></script>
</head>
<center>
<legend>MANAGE ACCOUNT</legend>
        <br>
        <table border = "1" style="width: 40%" >
            <tr>
                <th>ACCOUNT</th>
                <th>OPTION</th>
            </tr>
            <?php 
            while($row = mysqli_fetch_array($rs))
            {?>
                <tr align="center">
                    <td><?= $row['username']?></td>
                    <td>
                        <form action="changepassword.php" method="post">
                            <input type="hidden" name="id" value="<?=$row['uID']?>">
                            <input type="submit" name="" value="Change PassWord">
                        </form>
                        <form action="deleteaccount.php" method="post" onsubmit="return confirmDelete();">
                            <input type="hidden" name="id" value="<?=$row['uID'] ?>">
                            <input type="submit" value="Delete Account">
                        </form>
                    </td>
                </tr>
            <?php }
            ?>
        </table>
</center>