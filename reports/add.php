<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php'; // include the connection settings
include 'validate.php';

?>
<div class="page_container">
    <div class="container" style="width: 90%; margin: auto;">
        <h1 style="padding: 10px;">Add Sales</h1>
        <?php
        // Initialize validation array
        $validation = array('valid' => true, 'nulls' => '', 'id' => '', 'name' => '');

        // Check if form is submitted
        if (isset($_POST['submitted'])) {
            // Validate form input
            $validation = validate_sales($_POST['id'], $_POST['name'], $_POST['weight'], $_POST['supplier'], $_POST['cost'], $_POST['status'], $_POST['remarks'], $conn);

            if ($validation['valid']) {
                // Sanitize input for SQL query (if needed)
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $weight = mysqli_real_escape_string($conn, $_POST['weight']);
                $supplier = mysqli_real_escape_string($conn, $_POST['supplier']);
                $cost = mysqli_real_escape_string($conn, $_POST['cost']);
                $status = mysqli_real_escape_string($conn, $_POST['status']);
                $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);

                // Prepare SQL query to insert sales details
                $sql = "INSERT INTO `sales` (`id`, `name`, `weight`, `supplier`, `cost`, `status`, `remarks`)
                    VALUES ('$id', '$name', '$weight', '$supplier', '$cost', '$status', '$remarks')";

                // Execute SQL query
                if (mysqli_query($conn, $sql)) {
                    echo "You successfully added the sales.<br />";
                } else {
                    echo "Error: " . mysqli_error($conn) . "<br />";
                }
            } else {
                echo $validation['nulls']; // Display validation errors
            }
        }
        ?>
        <a href='index.php' class='btn btn-primary'>Back To Sales</a>
        <form action='' method='post' class="form-horizontal">
            <div class="control-group">
                <label class="control-label" for="id"> ID:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="ID" name='id' value='<?php echo isset($_POST['id']) ? $_POST['id'] : '' ?>' />
                    <?php echo $validation['id'] ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="name"> Product Name:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Product Name" name='name' value='<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>' />
                    <?php echo $validation['name'] ?>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="weight"> Weights:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Weights" name='weight' value='<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="supplier"> Supplier</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Supplier" name='supplier' value='<?php echo isset($_POST['supplier']) ? $_POST['supplier'] : '' ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="cost"> Cost</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Cost" name='cost' value='<?php echo isset($_POST['cost']) ? $_POST['cost'] : '' ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="status"> Status:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Status" name='status' value='<?php echo isset($_POST['status']) ? $_POST['status'] : '' ?>' />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="remarks"> Remarks:</label>
                <div class="controls">
                    <input class="input-xlarge" type="text" placeholder="Remarks" name='remarks' value='<?php echo isset($_POST['remarks']) ? $_POST['remarks'] : '' ?>' />
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type='hidden' value='1' name='submitted' />
                    <input type='submit' value='Add Sales' class="btn btn-success btn-large" />
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include '../incl/footer.incl.php';
?>