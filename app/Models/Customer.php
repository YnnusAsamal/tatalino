<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table ='customers';

    protected $fillable =[
        'lastname',
        'firstname',
        'middlename',
        'dob',
        'address',
        'contactNumber',
        'meterNumber',
        'status'
    ];

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    
}
