
<?php
///TODO: i think of implementing websocket protocol so some logic needed here...
/* set this information in database logout  */


session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>