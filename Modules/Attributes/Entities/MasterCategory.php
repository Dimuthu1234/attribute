<?php

namespace Modules\Attributes\Entities;

use Illuminate\Database\Eloquent\Model;

class MasterCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'type_id',
        'image',
        'status',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo('Modules\Attributes\Entities\MasterCategory', 'parent_id');
    }

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
