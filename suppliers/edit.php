<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';

?>
<div class="page_container">
    <div class="container" style="width: 90%; margin: auto;">
        <h1>Edit Suppliers</h1>
        <?php
        $Id = (int) $_GET['id'];
        if (isset($_POST['id'])) {
            $validation = validate_suppliers($_POST['id'], $_POST['name'], $_POST['phone'], $_POST['product'], $_POST['cost'], $_POST['payment'], $conn);
            if ($validation['valid'] == TRUE) {
                $sql = "UPDATE supplier SET id = '{$_POST['id']}', name = '{$_POST['name']}', phone = '{$_POST['phone']}', product = '{$_POST['product']}', cost = '{$_POST['cost']}', payment = '{$_POST['payment']}' WHERE id = '$Id'";
                $rslt = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $Id = $_POST['id'];
                echo (mysqli_affected_rows($conn)) ? "Supplier saved successfully.<br />" : "Nothing changed.<br />";
            } else {
                echo $validation['nulls'];
            }
        }
        $supplier_to_edit = mysqli_query($conn, "SELECT * FROM supplier WHERE id =" . stripslashes($Id));
        $row = mysqli_fetch_array($supplier_to_edit);
        ?>
        <a href='index.php' class='btn btn-primary' style="margin: 20px 0px;">Back trying to solve the probelm</a>
        <form action='' method='POST' class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="f_no"> Supplier Id</label>
                <div class="controls">
                    <input class="input-xlarge" type="number" placeholder="CCF****" name='id' value='<?php echo stripslashes($row['id']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_name"> Name:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Name.." name='name' value='<?php echo stripslashes($row['name']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_phone"> Phone</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="+254******.." name='phone' value='<?php echo stripslashes($row['phone']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_product"> Product</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Product.." name='product' value='<?php echo stripslashes($row['product']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_cost"> Cost</label>
                <div class="controls">
                    <input class="input-xlarge" type="number" placeholder="Cost.." name='cost' value='<?php echo stripslashes($row['cost']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_payment"> Payment</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Payment.." name='payment' value='<?php echo stripslashes($row['payment']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type='submit' value='Save' class="btn btn-success btn-large " />
                    <input type='hidden' value='1' name='submitted' />
                </div>
            </div>
        </form>
    </div>
</div>
<?php

include '../incl/footer.incl.php';
?>