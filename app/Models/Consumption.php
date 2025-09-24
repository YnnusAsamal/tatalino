<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    protected $table='consumptions';

    protected $fillable =[
        'customer_id',
        'referenceNum',
        'totalCons',
        'dateCons',
        'amountCons',
        'statusCons',
        'contactNumber',
        'remarks',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function scopeByMonth($query, $year, $month)
    {
        return $query->whereYear('dateCons', $year)
            ->whereMonth('dateCons', $month);
    }
    
    
    

}
