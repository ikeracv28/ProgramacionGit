<?php
session_start();
session_destroy();
header("Location: index.php?mensaje=sesion_cerrada");
exit();
