<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProjectFavourite;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user() {
        return  $this->belongsTo(User::class);
    }

    public function favourites() {
        return $this->hasMany(ProjectFavourite::class);
    }

    public function favouritedBy(User $user) {
        return $this->favourites->contains('user_id', $user->id);
    }
}
