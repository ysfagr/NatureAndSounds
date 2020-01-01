<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sounds()
    {
        return $this->hasMany(Sound::class);
    }
}

