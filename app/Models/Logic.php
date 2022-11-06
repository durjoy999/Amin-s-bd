<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logic extends Model
{
    protected $guarded = [];
    /**
     * this function return who create this blog
     */
    public function adminCreatedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'created_by', 'id');
    }
    /**
     * this function return who edited this blog
     */
    public function adminEditedBy()
    {
        return $this->belongsTo('App\Models\Admin', 'edited_by', 'id');
    }
}
