<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'user_id',
        'total',
        'date',
        'time',
        'type',
        'description',
        'canceled',
        'canceledBy',
        'dateTime'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function details(){
        return $this->hasMany(Detail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
