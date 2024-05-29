<?php

use Blog\models\CheckSession;

require_once 'vendor/autoload.php';

// Destrói a sessão do usuário.
$check_session = new CheckSession;
$check_session->destroySession();