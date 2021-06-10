<?php
    require_once "admin-login.php";
    $id = $_GET['id'];
    $qry = "DELETE  FROM product WHERE pID = '$id' ";
    $result = qryrun($qry);
    if($result)
    {?>
        <script>
            alert("DELET SUCCESS");
            window.location.href = "manage-product.php";
        </script>
    <?php } else{?>
            <script>
                alert("Please Check Again!");
                window.location.href = "manage-product.php";
            </script>
    <?php }
?>