<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="../css/styles.css">

</head>

<body>

    <?php
    include '../incl/header.incl.php';
    include("../incl/conn.incl.php"); // include the connection settings
    include 'validate.php';

    $validation = array('valid' => true, 'nulls' => '', 'id' => '');
    if (isset($_POST['product_id'])) {
        $validation = validate_products(
            $_POST['product_id'],
            $_POST['name'],
            $_POST['manufacture'],
            $_POST['rate'],
            $_POST['weight'],
            $_POST['cost'],
            $conn
        );
        if ($validation['valid'] == true) {
            $sql = "INSERT INTO `products` ( `product_id`, `name`, `manufacture`, `rate`, `weight`, `cost` ) VALUES (
            '{$_POST['product_id']}', 
            '{$_POST['name']}', 
            '{$_POST['manufacture']}', 
            '{$_POST['rate']}', 
            '{$_POST['weight']}', 
            '{$_POST['cost']}'
        )";

            mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $message = "You successfully added the product.<br />";
        } else {
            $message = $validation['nulls'];
        }
    }
    ?>

    <di class="page_container">
        <div class="container">

            <h1 style="padding: 10px;">Add products</h1>
            <?php if (isset($message)) echo $message; ?> <br>
            <a href='index.php' class='btn btn-primary' style="margin: 10px 0px !important;">Back To products</a>
            <form action='' method='post' class="form-horizontal">

                <div class="control-group">
                    <label class="control-label" for="f_id">ID</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="101" name='product_id' />
                        <?php if (isset($validation['id'])) echo "<span class='error-message'>{$validation['id']}</span>"; ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="f_name">Name of products:</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="Name.." name='name' />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="f_locallity">Manufacture of products:</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="xyz" name="manufacture" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="f_ac">Products' rate:</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="NPR 100" name='rate' />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="f_phone">Products weight:</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="2kg" name='weight' />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="f_phone">Cost of the product:</label>
                    <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="NPR 2000" name='cost' />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <input type='hidden' value='1' name='submitted' />
                        <input type='submit' value='Add products' class="btn btn-primary btn-large" />
                    </div>
                </div>
            </form>
        </div>
    </di>

    <?php
    include '../incl/footer.incl.php';
    ?>

    <script src="path_to_your_js_file.js"></script> <!-- Link to your JS file -->
</body>

</html>