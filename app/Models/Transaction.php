<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transaction";
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'created_at',
        'updated_at'
    ];

}
