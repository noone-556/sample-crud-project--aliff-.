<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // If your primary key is VARCHAR, tell Laravel
    protected $keyType = 'string';
    public $incrementing = false;

    // Fillable columns (for mass assignment)
    protected $fillable = [
        'id',          
        'name',
        'email',
        'positions',
        'contract_type',
        'phone',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'updated_at'
        // add other columns here, e.g., 'department'
    ];
}
