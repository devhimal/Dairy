<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<div style=" padding: 50px 30px !important; min-height:50vh;">
    <h1 style="margin-bottom: 40px; margin-left: 20px;">Reports</h1>
    <?php
    if (isset($_GET['delete'], $_GET['id'])) {
        $id = (int) $_GET['id'];
        mysqli_query($conn, "DELETE FROM `sales` WHERE `id` = '" . $id . "'");
        echo (mysqli_affected_rows($conn)) ? "You have successfully deleted the sales record.<br /> " : "<br /> ";
    }
    ?>

    <div style="display: flex; gap: 20px; margin-left: 20px; margin-top:20px !important; margin-bottom:200px;">

        <div style="border: 1px solid blue; padding: 10px !important; border-radius: 8px;">
            <a href="per_day_sales.php" style="text-decoration: none;">
                <img src="../img/month.png" style="width: 100px; height: 100px;"><br /> <br>
                Per Day Sales Reports
            </a>
        </div>

        <div style="border: 1px solid blue; padding: 10px !important; border-radius: 8px;">
            <a href="total_sales.php" style="text-decoration: none; margin-top: 20px !important; ">
                <img src="../img/month.png" style="width: 100px; height: 100px;"><br /><br>
                Total Sales Reports
            </a>
        </div>

    </div>
</div>



<?php
include '../incl/footer.incl.php';
?>