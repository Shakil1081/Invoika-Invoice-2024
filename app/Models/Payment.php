<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Stripe\Invoice;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function addInvoiceMaster()
    {
        return $this->belongsTo(AddInvoiceMaster::class,'invoice_id');
    }
}
