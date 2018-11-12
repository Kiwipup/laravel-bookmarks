<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    public function user() {
        return $this->belongsTo('\App\User');
    }

    public function bookmarks() {
        return $this->belongsToMany('\App\Bookmark');
    }
}
