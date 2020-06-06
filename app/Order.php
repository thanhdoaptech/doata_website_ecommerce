<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Order extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'orders';

    protected $dates = [
        'date_shipped',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const SHIPPING_STATUS_RADIO = [
        'prepared' => 'Prepared',
        'shipping' => 'Shipping',
        'shipped'  => 'Shipped',
        'cancel'   => 'Cancel',
    ];

    public static $searchable = [
        'amount',
        'ship_name',
        'ship_address_2',
        'country',
        'city',
        'zip',
        'phone',
        'fax',
        'shipping_status',
        'tax',
        'email',
        'date_shipped',
    ];

    protected $fillable = [
        'user_id',
        'amount',
        'ship_name',
        'ship_address',
        'ship_address_2',
        'country',
        'city',
        'zip',
        'phone',
        'fax',
        'shipping_status',
        'tax',
        'email',
        'tracking_number',
        'date_shipped',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function orderOrderDetails()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateShippedAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateShippedAttribute($value)
    {
        $this->attributes['date_shipped'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
