<?php
// Include necessary files or initialize connections
include '../incl/header.incl.php';
include '../incl/conn.incl.php';  // Assuming this file contains your database connection code

// SQL query to fetch data from the payment table
$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment List</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <div class="page_container">
        <div class="container">
            <h1 style="padding: 30px 0px !important;">Payment List</h1>
            <?php
            // Check if there are any results
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table table-hover table-striped table-condensed table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>#</th>';
                echo '<th>Supplier</th>';
                echo '<th>Amount</th>';
                echo '<th>Date</th>';
                echo '<th>Check</th>';
                echo '<th>Remarks</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Output data of each row
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $i++;
                    echo '<tr>';
                    echo '<td>' . $i . '</td>';
                    echo '<td>' . htmlspecialchars($row['supplier']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['amount']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['date']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['check']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['remarks']) . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p>No results found.</p>";
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </div>



    <?php
    // Include footer or other necessary files
    include '../incl/footer.incl.php';
    ?>

</body>

</html>