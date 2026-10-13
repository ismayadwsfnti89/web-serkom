<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Crypt;

class IdEncryptor
{
    /**
     * Encrypt ID jadi string yang aman untuk URL.
     *
     * Contoh:
     *   encrypt_id(1)  → "eyJpdiI6IkxrQ2l0Q1l5..."
     */
    public static function encrypt($id): string
    {
        return Crypt::encryptString((string) $id);
    }

    /**
     * Decrypt string dari URL jadi ID asli.
     *
     * Contoh:
     *   decrypt_id("eyJpdiI6IkxrQ2l0Q1l5...")  → 1
     */
    public static function decrypt(string $encrypted): string
    {
        return Crypt::decryptString($encrypted);
    }
}