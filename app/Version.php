<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $fillable = ['version_code', 'force_update', 'platform', 'language_version_code'];

    protected $casts = [
        'force_update' => 'bool',
    ];
}

