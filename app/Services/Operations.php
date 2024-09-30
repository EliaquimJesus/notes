<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class Operations
{
    static function decryptId(string $id): mixed
    {
        // check if id is encrypyed
        try {
            //code...
            $id = Crypt::decrypt($id);

        } catch (DecryptException $e) {
            //throw $th;
            return redirect()->route('home');
        }

        return $id;
    }
}