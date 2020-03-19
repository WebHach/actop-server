<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use SoftDeletes;

    //дата начала - дата конца
    const PERIODICAL = 1;
    //каждый вторник
    const CONSTANT = 2;

    const FIELD_SELECT = [
        'id',
        'name',
        'type',
        'company_id',
        'day_begin',
        'day_end',
        'time_begin',
        'time_end',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'date_begin' => 'date'
    ];

    public function days()
    {
        return $this->hasMany(StockDays::class);
    }

    public function company () {
        return $this->belongsTo(Company::class)->select(['id', 'name', 'logo']);
    }
}
