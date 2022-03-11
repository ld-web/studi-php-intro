<?php

require_once 'functions.php';

// Déconnexion
session_start();
$_SESSION = [];
session_destroy();
// Redirection vers la page d'accueil
redirect('index.php');
