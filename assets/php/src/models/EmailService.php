<?php

namespace Blog\models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require_once 'connection.php';
require 'vendor/autoload.php';

session_start();

class EmailService 
{
    private $mail;
    private $connection;

    public function __construct($connection) 
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $this->mail = new PHPMailer(true);
        $this->connection = $connection;
    }

    private function getUserDatas()
    {    
        $query_current_user = "SELECT first_name, last_name, username, email FROM user_ WHERE pk_user = ?";

        if ($stmt = $this->connection->prepare($query_current_user)) {
            $stmt->bind_param("i", $_SESSION["user_session"]);

            $stmt->execute();

            $result = $stmt->get_result();
            $current_user = $result->fetch_assoc();

            $stmt->close();

            if ($current_user) {
                return [
                    'first_name' => $current_user['first_name'],
                    'last_name'  => $current_user['last_name'],
                    'username'   => $current_user['username'],
                    'email'      => $current_user['email'],
                ];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function getEmailData() 
    {
        $email_msg = $_POST['email_msg'] ?? false;
        $email_subject = $_POST['email_subject'] ?? false;

        if (!$email_msg || !$email_subject) {
            throw new Exception('Email, assunto ou mensagem não informados.');
        }

        return [
            'email_msg' => $email_msg,
            'email_subject' => $email_subject
        ];
    }

    public function configureEmail($email_msg, $email_subject) 
    {
        $current_user = $this->getUserDatas();

        $this->mail->isSMTP();
        $this->mail->SMTPDebug = $_ENV['SMTP_DEBUG'];
        $this->mail->SMTPAuth = $_ENV['SMTP_AUTH'];
        $this->mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $this->mail->Host = $_ENV['SMTP_HOST'];
        $this->mail->Port = $_ENV['SMTP_PORT'];

        $this->mail->Username = $_ENV['SMTP_USERNAME'] ?? false;
        $this->mail->Password = $_ENV['SMTP_PASSWORD'] ?? false;

        if (!$this->mail->Username || !$this->mail->Password) {
            throw new Exception('Variáveis de ambiente SMTP_USERNAME ou SMTP_PASSWORD não estão definidas.');
        }

        $this->mail->setFrom($current_user['email'], $current_user['first_name'] . ' ' . $current_user['last_name'] . '-' . $current_user['email']);
        $this->mail->addAddress($_ENV['SMTP_EMAIL_ADM_BLOG'], 'ADM | Se Quiser Sim Receitas');

        $this->mail->Subject = "Se Quiser Sim Receitas | $email_subject";
        $this->mail->msgHTML($email_msg);
    }

    public function sendEmail() 
    {
        if ($this->mail->send()) {
            echo 'E-mail enviado com sucesso!';
        }
    }
}