<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];

    protected $appends = ['overall_balance'];

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function getOverallBalanceAttribute()
    {
        return $this->wallets->sum('balance');
    }
}
