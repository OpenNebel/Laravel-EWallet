<?php

namespace OpenNebel\EWallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{

    protected $guarded = ['id'];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(config('wallet.owner_model', 'App\Models\User'));
    }
}
