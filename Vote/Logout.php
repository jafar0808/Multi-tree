<?php
session_start();
unset( $_SESSION['user']);
 unset($_SESSION['Vid']);
 unset($_SESSION['city']);
 header("Location: http://localhost/Vote/Front.html");