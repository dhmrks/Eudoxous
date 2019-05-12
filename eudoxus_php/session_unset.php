<?php
session_destroy(); // Is Used To Destroy All Sessions
//Or
if(isset($_SESSION['id']))
unset($_SESSION['id']);  //Is Used To Destroy Specified Session