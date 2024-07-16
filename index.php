<?php
include("incl/header.incl.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dairy Management System</title>
    <link rel="stylesheet" href="./css//styles.css" />

</head>

<body>

    <div id="wrapper1">
        <div id="navigation" class="">
            <div>
                <h2 style="text-align: start;color:white; padding:10px 0px!important; margin-bottom:20px !important;border-bottom:1px solid #dc3545; ">
                    Dashboard</h2>
            </div>
            <ul class="nav-container">
                <li><a href="<?php echo Page_Url(); ?>">Home</a></li>
                <li><a href="<?php echo Page_Url(); ?>products/index.php">Products</a></li>
                <li><a href="<?php echo Page_Url(); ?>suppliers/index.php">Supliers</a></li>
                <li><a href="<?php echo Page_Url(); ?>employees/index.php">Employees</a></li>
                <li><a href="<?php echo Page_Url(); ?>payment/index.php">Payments</a></li>
                <li><a href="<?php echo Page_Url(); ?>reports/index.php">Reports</a></li>
            </ul>
        </div>
        <div class="container1">
            <div class="span">
                <div class="span-3">
                    <a href='products/index.php'>
                        <img src=" img/icons/product1.png" alt="product"><br />
                        <strong style="text-align: center !important;">Products</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='suppliers/index.php'>
                        <img src="img/icons/suplier.png" alt="supliers"><br />
                        <strong>Supliers</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='employees/index.php'>
                        <img src="img/icons/people.svg" alt="Employees"><br />
                        <strong>Employees</strong>
                    </a>
                </div>

                <div class="span-3">
                    <a href='reports/index.php'>
                        <img src="img/icons/report.png" alt="Reports"><br />
                        <strong>Reports</strong>
                    </a>
                </div>
                <div class="span-3">
                    <a href='payment/index.php'>
                        <img src="img/icons/image.png" alt="Payments"><br />
                        <strong>Payments</strong>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
    // include("incl/footer.incl.php");
    ?>
</body>

</html>


<?php
include("incl/footer.incl.php");
?>