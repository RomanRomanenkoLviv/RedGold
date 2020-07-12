<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUsernameAttribute() {
        return optional($this->user)->name;
    }
}
