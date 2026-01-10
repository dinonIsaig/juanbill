<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $primaryKey = 'unit_id';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'unit_id',
        'unit_area',
        'bldg_no',
        'floor_no',
        'unit_no',
    ];
}
