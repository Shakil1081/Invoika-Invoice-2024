<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddInvoiceMaster extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'add_invoice_masters';

    protected $dates = [
        'inv_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'select_client_id',
        'invoice_number',
        'inv_date',
        'payment_status_id',
        'billing_address_id',
        'shipping_address_id',
        'sub_total',
        'discount',
        'tax',
        'shipping_charge',
        'total_amount',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function select_client()
    {
        return $this->belongsTo(CompanyList::class, 'select_client_id');
    }

    public function getInvDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvDateAttribute($value)
    {
        $this->attributes['inv_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function payment_status()
    {
        return $this->belongsTo(PaymentStatus::class, 'payment_status_id');
    }

    public function billing_address()
    {
        return $this->belongsTo(BillingAddress::class, 'billing_address_id');
    }

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id');
    }

    public function invoice_details()
    {
        return $this->hasMany(InvoiceDerail::class, 'invoice_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'invoice_id');
    }
}
