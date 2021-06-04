<?php
session_start();
echo $_SESSION['tid'];
echo "<br/>";
echo '<pre>';
print_r($_REQUEST);
?>

