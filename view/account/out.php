<?php
error_reporting(0);
require '../../Core.php';
$kun = new System;
session_destroy();

header('Location: home');

?>
