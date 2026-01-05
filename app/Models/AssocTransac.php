<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocTransac extends Model
{
    use HasFactory;

    protected $table = 'assoctransac'; 

    protected $primaryKey = 'TransactionID';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'TransactionID',
        'DueDate',         
        'DatePaid',       
        'Amount',
        'Unit',
        'Status'  
    ];
}