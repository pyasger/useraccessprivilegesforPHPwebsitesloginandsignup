<?php 

session_start();

include "access.php";
access ('ACCOUNTANT');
include "header.php";

?>

<h1>This is the Accountant page</h1>

<?php include "footer.php" ?>