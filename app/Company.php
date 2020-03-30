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
        $hostname = env('APP_URL');
        if(isset($val)){
            return $hostname.'/'.$val;
        }else{
            return 'https://connpass-tokyo.s3.amazonaws.com/thumbs/85/70/85705a71d60ab08309c70071b51eba39.png';
        }

    }
}
