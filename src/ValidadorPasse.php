<?php


class ValidadorPasse
{
    public function valida(string $passe): bool
    {
        // TODO P5.3: implementa aqui o requisito 1 (minimo de 8 caracteres).
        if (strlen($passe) < 8) {
            return false;
        }

        // TODO P5.3: implementa aqui o requisito 2 (pelo menos uma letra maiuscula).
        if (!preg_match('/[A-Z]/', $passe)) {
            return false;
        }

        // TODO P5.3: implementa aqui o requisito 3 (pelo menos um digito).
        if (!preg_match('/[0-9]/', $passe)) {
            return false;
        }

        return true;
    }
}

