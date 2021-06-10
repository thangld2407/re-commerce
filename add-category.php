<?php
    require_once 'admin-login.php';
    if(isset($_POST['addcate']))
{    
        $catename = $_POST['catename'];
        $qry = "SELECT * FROM category WHERE cName = '$catename' ";
        $runqry = qryrun($qry);
        if($runqry->num_rows >0)
        {?>
            <script>
                alert("Add Failed ");
                window.location.href = "add-category.php";
            </script>   
        <?php 
        }
        else 
        { 
            $sql = "INSERT INTO category(cName) VALUES  ('$catename')";
            $run = qryrun($sql);
            if($run)
            {?>
                <script>
                    alert("add success!!");
                    window.location.href = "manage-category.php";
                </script>
            <?php }
        }
    } 
?>
<br><br>
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
        <form action="add-category.php" method="post">
            <legend> <h1>ADD CATEGORY</h1></legend><br>
           <p>Category Name</p><br> <input class = "input-box" type="text" name="catename" placeholder="Enter Category" required>
            <br><br>
            <input class = "btn-box" type="submit" value="Submit" name = "addcate">
        </form>
        </td>
        </table>
    </body>
</center>