<?php

namespace Modules\Attributes\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'status',
        'image',
        'description',
    ];


    public function attributeLabels()
    {
        return $this->belongsToMany('Modules\Attributes\Entities\AttributeLabel')
        ->withTimestamps();
    }

    public function getAttributeLabelListAttribute()
    {
        return $this->attributeLabels->pluck('id')->all();
    }
}
