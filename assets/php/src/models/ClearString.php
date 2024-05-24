<?php

namespace Blog\models;

// Classe com métodos úteis para limpeza de textos ou valores de inputs.
class ClearString
{
    // Limpa a string permitindo letras, números e underline.
    public function clearUsername(string $username): string
    {
        return preg_replace('/[^a-zA-Z0-9_]/', '', $username);
    }

    // Limpa a string permitindo apenas letras.
    public function clearText(string $text): string
    {
        return preg_replace('/[^a-zA-Z]/', '', $text);
    }

    // Limpa a string permitindo apenas letras, números, "@" e ponto final(.).
    public function clearEmail(string $str): string
    {
        return preg_replace('/[^a-z0-9._+-]+@[a-z0-9.-]+\.[a-z]{2,}/', '', $str);
    }

    public function clearPassword(string $password): string
    {
        return preg_replace('/[^a-zA-Z0-9#?!@$%^&*-]/', '', $password);
    }
}
