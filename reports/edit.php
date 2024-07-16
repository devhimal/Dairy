<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';

?>
<div class="page_container">
    <div class="container" style="width: 90%; margin: auto;">
        <h1>Edit Sales</h1>
        <?php
        $Id = (int) $_GET['id'];
        if (isset($_POST['id'])) {
            $validation = validate_sales($_POST['id'], $_POST['name'], $_POST['weight'], $_POST['supplier'], $_POST['cost'], $_POST['status'], $_POST['remarks'], $conn);
            if ($validation['valid'] == TRUE) {
                $sql = "UPDATE sales SET id = '{$_POST['id']}', name = '{$_POST['name']}', weight = '{$_POST['weight']}', supplier = '{$_POST['supplier']}', cost = '{$_POST['cost']}', status = '{$_POST['status']}', remarks = '{$_POST['remarks']}' WHERE id = '$Id'";
                $rslt = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $Id = $_POST['id'];
                echo (mysqli_affected_rows($conn)) ? "Sales record saved successfully.<br />" : "Nothing changed.<br />";
            } else {
                echo $validation['nulls'];
            }
        }
        $sales_to_edit = mysqli_query($conn, "SELECT * FROM sales WHERE id =" . stripslashes($Id));
        $row = mysqli_fetch_array($sales_to_edit);
        ?>
        <a href='index.php' class='btn btn-primary' style="margin: 20px 0px;">Back To Sales</a>
        <form action='' method='POST' class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="f_no"> Sale Id</label>
                <div class="controls">
                    <input class="input-xlarge" type="number" placeholder="Sale ID" name='id' value='<?php echo stripslashes($row['id']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_name"> Product Name:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Product Name" name='name' value='<?php echo stripslashes($row['name']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_phone"> Weights:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Weights" name='weight' value='<?php echo stripslashes($row['weight']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_product"> Supplier</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Supplier" name='supplier' value='<?php echo stripslashes($row['supplier']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_cost"> Cost</label>
                <div class="controls">
                    <input class="input-xlarge" type="number" placeholder="Cost" name='cost' value='<?php echo stripslashes($row['cost']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_payment"> Status</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Status" name='status' value='<?php echo stripslashes($row['status']) ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="f_payment"> Remarks</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Remarks" name='remarks' value='<?php echo stripslashes($row['remarks']) ?>' />
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