<?php

use App\Helpers\IdEncryptor;

if (!function_exists('encrypt_id')) {
    /**
     * Encrypt ID untuk URL.
     */
    function encrypt_id($id): string
    {
        return IdEncryptor::encrypt($id);
    }
}

if (!function_exists('decrypt_id')) {
    /**
     * Decrypt ID dari URL.
     */
    function decrypt_id(string $encrypted): string
    {
        return IdEncryptor::decrypt($encrypted);
    }
}