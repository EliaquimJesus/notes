<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /*
    * One user to many notes
    */
    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

}