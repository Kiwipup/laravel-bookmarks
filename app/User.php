<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function profile() {
        return $this->hasOne('\App\Profile');
    }

    public function bookmarks() {
        return $this->hasMany('\App\Bookmark')->orderBy('name');
    }

    public function uncatalogued_bookmarks() {
        return $this->bookmarks()->doesntHave('catalogues')->orderBy('name');
    }

    public function catalogues() {
        return $this->hasMany('\App\Catalogue')->orderBy('name');
    }

}
