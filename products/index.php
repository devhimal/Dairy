<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>

<body>
    <div class="page_container">
        <div class="container">
            <h1>Products</h1>
            <?php
            if (isset($_GET['delete'], $_GET['id'])) {

                $Id = (int) $_GET['id'];
                mysqli_query($conn, "DELETE FROM `products` WHERE `product_id` = '" . stripslashes($Id) . "' ");
                echo (mysqli_affected_rows($conn)) ? "You have successfully deleted the product.<br /> " : "<br /> ";
            }
            ?>
            <a class="btn btn-large btn-primary" href="add.php">
                <i class="icon-plus icon-white"></i> Add products
            </a><br /><br />
            <table class="table table-hover table-striped table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Manufacture Date</th>
                        <th>Expiry Date</th>
                        <th>Rate per kg</th>
                        <th>Total Weights</th>
                        <th>Total Cost</th>

                        <th style="text-align: center; background-color: blue; color: white; font-weight: bold;">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $qry = mysqli_query($conn, "SELECT * FROM products") or die("Unable to fetch records" . mysqli_error($conn));
                    while ($row = mysqli_fetch_array($qry)) {
                        foreach ($row as $key => $value) {
                            $row[$key] = stripslashes($value);
                        }
                        $total_cost = $row['rate'] * $row['weight'];
                        echo '<tr>';
                        echo '<td>' . $row['product_id'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['manufacture_date'] . '</td>';
                        echo '<td>' . $row['expiry_date'] . '</td>';
                        echo '<td>' . $row['rate'] . '</td>';
                        echo '<td>' . $row['weight'] . '</td>';
                        echo '<td>' . $total_cost . '</td>';

                        if ($current_user['role'] != 'Clerk') {
                            echo '<td style="text-align: center;">
                                <a href="' . PAGE_URL . 'products/edit.php?edit=1&id=' . $row['product_id'] . '" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i> Edit</a> | 
                                <a href="' . PAGE_URL . 'products/?delete=1&id=' . $row['product_id'] . '" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i> Delete</a>
                            </td>';
                        }
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php
include '../incl/footer.incl.php';
?>