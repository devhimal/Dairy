<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
?>
<div class="page_container">
    <div class="container" style="width: 90%; margin: auto;">
        <h1>Sales</h1>

        <a class="btn btn-large btn-primary" href="add.php" style="padding: 20px; margin: 10px 0px;"><i
                class="icon-plus icon-white"></i>Add Sales</a><br /><br />
        <table class="table table-hover table-striped table-condensed table-bordered" style="padding: 10px;">
            <thead class="">
                <tr>
                    <th style="padding: 10px;">ID</th>
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Weight</th>
                    <th style="padding: 10px;">Supplier</th>
                    <th style="padding: 10px;">Cost</th>
                    <th style="padding: 10px;">Status</th>
                    <th style="padding: 10px;">Remarks</th>
                    <th style="text-align: center; padding: 10px; background-color:blue; color:white; font:bold;">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $qry = mysqli_query($conn, "SELECT * FROM `sales`") or die("Unable to fetch records" . mysqli_error($conn));
                while ($row = mysqli_fetch_assoc($qry)) {
                    echo '<tr>';
                    echo '<td style="padding: 10px;">' . $row['id'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['name'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['weight'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['supplier'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['cost'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['status'] . '</td>';
                    echo '<td style="padding: 10px;">' . $row['remarks'] . '</td>';
                    echo '<td style="text-align: center; padding: 10px;">
                        <a href="' . PAGE_URL . 'reports/edit.php?edit=1&id=' . $row['id'] . '" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                        <a href="' . PAGE_URL . 'reports/?delete=1&id=' . $row['id'] . '" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a>
                    </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include '../incl/footer.incl.php';
?>