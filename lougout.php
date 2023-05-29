
<?php
//TODO: i think of using websocket so some logic needed here...
/* set this information in database logout  */
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit();
?>