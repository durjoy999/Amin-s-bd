<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'created_by',
        'edited_by',
    ];
    public function adminCreatedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }

    public function adminEditedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'edited_by', 'id');
    }
}
