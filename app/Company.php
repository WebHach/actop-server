<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function stocks()
    {
        return $this->hasMany(Stock::class)->with('days');
    }

    public function getLogoAttribute($val)
    {
        return $val ?? 'https://connpass-tokyo.s3.amazonaws.com/thumbs/85/70/85705a71d60ab08309c70071b51eba39.png';
    }

}
