<?php
if($_GET['logout'])
{
	session_unset();
	session_destroy();
	echo '<script>location.href="/megaturnos/UI/Inicio/";</script>';
}