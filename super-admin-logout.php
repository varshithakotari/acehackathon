<?php

//logout.php

session_start();

session_destroy();

header('location:super-admin-login.php');


?>