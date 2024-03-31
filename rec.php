<?php 

session_start();

include "access.php";
access('RECEPTIONIST');

include "header.php";

?>

<h1>This is the receptionist page</h1>

<?php include "footer.php" ?>