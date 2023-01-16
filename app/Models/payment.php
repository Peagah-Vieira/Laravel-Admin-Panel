<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'amount',
        'payment_time',
        'payment_date',
    ];

    /**
     * Function that makes the relationship about member
     *
     * @return relationship
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Function that makes the relationship about membershiptype
     *
     * @return relationship
     */
    public function membershiptype(){
        return $this->belongsTo(Membershiptype::class);
    }
}
