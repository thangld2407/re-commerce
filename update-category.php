<?php
    require_once "admin-login.php";
    $id = $_POST['categoryid'];
    if(isset($_POST['updatecate']))
    {
        $catename = $_POST['catename'];
        $sql = "UPDATE category SET cName = '$catename' WHERE cID = '$id' ";
        $run = qryrun($sql);
        if($run)
        {?>
            <script>
                alert("Update suceesss");
                window.location.href = "manage-category.php";
            </script>
        <?php }else
        {?>
              <script>
                  alert("Check again!");
                  window.location.href = "manage-category.php";
              </script>      
        <?php }
    }
?>
<head>
    <style>
        body{
            background-color: #cff2ae;
        }
        table{
            border-radius: 20px;
            color: red; 
            margin-top: 150px; 
        }
        table td{
            padding-top: 20px;
            border-radius: 20px;
        }
        table h1{
            margin-top: 20px;
        }
        form p{
            font-size: 20px;
            color: blue;
        }
        .input-box{
            height: 40px;
            width: 200px;
            border-radius: 12px;
        }
        .btn-box{
            font-size: 20px;
            text-align: center;
            border-radius: 10px;
            color: blue;
            background-color: #00d0ff;
            margin-top: 10px;
        }

    </style>
</head>
<center>
    <body>
        <table border = "1" align="center">
        <td align="center" style="height: 120px; width: 50%" bgcolor="wheat" >
        <form action="update-category.php" method="post">
            <legend> <h1>UPDATE CATEGORY</h1></legend><br>
            <?php
                $sql1 = "SELECT * FROM category WHERE cID = '$id'";
                $run1 = qryrun($sql1);
                $ctg = mysqli_fetch_array($run1);
            ?>
            <input type="hidden" name="categoryid" value="<?=$ctg[0]?>">
           <p>Category Name</p><br> <input class = "input-box" type="text" name="catename" placeholder="Enter Category" value="<?=$ctg[1]?>" required>
            <br><br>
            <input class = "btn-box" type="submit" value="Submit" name = "updatecate">
        </form>
        </td>
        </table>
    </body>
</center>