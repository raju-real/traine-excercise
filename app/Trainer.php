<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    public function tutorials() {
        return $this->hasMany(TrainerTutorial::class);
    }
}
