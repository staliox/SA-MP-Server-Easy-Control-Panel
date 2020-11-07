<?php
/* Clear Cookie And Redirect To Login Page */
setcookie("__account", "CP_Samp", time()-3600, "/");
header("Location: ../..");
?>