<?php 

session_start();

include "access.php";
access('ADMIN');

include "header.php";

?>

<h1>This is the administration page</h1>

<?php include "footer.php" ?>