<?php

namespace Modules\Attributes\Entities;

use Illuminate\Database\Eloquent\Model;

class AttributeLabel extends Model
{
    protected $fillable = [
        'name',
        'table_id',
        'status',
        'recorded_id',
    ];

    public function types()
    {
        return $this->belongsToMany('Modules\Attributes\Entities\Type')
        ->withTimestamps();
    }

    public function masterCategories()
    {
        return $this->belongsToMany('Modules\Attributes\Entities\MasterCategory')
            ->withTimestamps();
    }

    public function getTypeListAttribute()
    {
        return $this->types->pluck('id')->all();
    }

    public function getMasterCategoryListAttribute()
    {
        return $this->masterCategories->pluck('id')->all();
    }
}
