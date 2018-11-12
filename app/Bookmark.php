<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function catalogues() {
        return $this->belongsToMany('\App\Catalogue');
    }
}
