<?php

// require_once 'scr/models/EmailService.php';
require_once 'connection.php';
require_once 'vendor/autoload.php';

use Blog\models\EmailService;

try {
    $emailService = new EmailService($connection);
    $dadosEmail = $emailService->getEmailData();
    $emailService->configureEmail($dadosEmail['email_msg'], $dadosEmail['email_subject']);
    $emailService->sendEmail();

} catch (Exception $e) {
    error_log("Erro ao enviar e-mail: {$e->getMessage()}");
    echo "Ocorreu um erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
}