<?php
    require_once 'admin-login.php';
    if(isset($_POST['categoryid']))
    {
        $id= $_POST['categoryid'];
        $sql = "SELECT * FROM product WHERE cID = '$id'";
        $run = qryrun($sql);
        if($run->num_rows > 0)
        {?>
            <script>
                alert("Please delete all product have in this category ");
                window.location.href="manage-category.php";
            </script>
        <?php 
        }
        else
        {
            $sql1 = "DELETE FROM category WHERE cID = '$id'";
            $run1 = qryrun($sql1);
            ?>
                <script>
                    alert("Delete Success");
                    window.location.href = "manage-category.php";
                </script>
            <?php
         }
    }
?>