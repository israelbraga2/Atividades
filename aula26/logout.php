<?php

session_start();
unset( $_SESSION["usuarioLogado"] );
session_destroy();
header("Location: index.php");