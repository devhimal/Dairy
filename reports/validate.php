<?php
function validate_sales($id, $name, $weight, $supplier, $cost, $status, $remarks, $conn)
{
    $errors = array('valid' => true, 'nulls' => '', 'id' => '',);
    $has_errors = false;

    // Check for empty fields
    if ($id == '' || $name == '' || $weight == '' || $supplier == '' || $cost == '' || $status == '' || $remarks == '') {
        $errors['nulls'] = '<span class="error badge badge-warning"> All fields with * are required</span>';
        $has_errors = true;
    }

    $idresult = mysqli_query($conn, "select * from sales where id='$id'") or die("unable to fetch records" . mysqli_error($conn));
    if (mysqli_num_rows($idresult) > 1) {
        $errors['id'] = "<span class='error  badge badge-warning'>Sales with id id:$id Has been registered already</span>";
        $has_errors = TRUE;
    } else {
        $errors['id'] = '';
    }

    // Validate uniqueness of Phone Number
    $idresult = mysqli_query($conn, "select * from sales where id='$id'") or die("unable to fetch records" . mysqli_error($conn));
    if (mysqli_num_rows($idresult) > 1) {
        $errors['id'] = "<span class='error  badge badge-warning'>Sales with id id:$id Has been registered already</span>";
        $has_errors = TRUE;
    } else {
        $errors['id'] = '';
    }

    $errors['valid'] = !$has_errors;
    return $errors;
}
