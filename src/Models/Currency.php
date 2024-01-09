<?php

namespace OpenNebel\EWallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Currency extends Model
{
    protected $guarded = ['id'];

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }
}
