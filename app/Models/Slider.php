<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    public function adminCreatedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }

    public function adminEditedBby()
    {
        return $this->belongsTo('App\Models\Admin', 'edited_by', 'id');
    }
}

