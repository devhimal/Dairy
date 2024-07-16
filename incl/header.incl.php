<?php
define('PAGE_URL', 'http://localhost/Dairy/');
$current_user = array();

function Page_Url()
{
    echo PAGE_URL;
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8" />
    <title>Dairy Record Manager</title>
    <link rel="stylesheet" href="../css/styles.css" />
</head>

<body>
    <!--    The top of the page visible on all pages in the system-->

    <div id="top" class="page-header" style="border:none !important; padding:0px 20px">

        <!--top logo-->
        <a href="<?php Page_Url(); ?>"><img src="<?php Page_Url() ?>img/logo1.png" / alt="logo" id="logo"></a>

        <div id="navigation1">
            <h1 id="title">Dairy Management System</h1>
        </div>
        <div></div>
        <div style="padding: 14px 18px !important; border-radius:4px; background-color:#dc3545; ">

            <a href="/Dairy/login/logout.php" style="color:white;font:bold; text-decoration:none;">Logout</a>

        </div>
    </div>