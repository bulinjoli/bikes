<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoice';
    protected $primaryKey = 'invoice_code';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['customer_number', 'customer_name', 'description', 'total_net', 'total_gross', 'total_vat'];

    //protected $hidden = ['invoice_code'];

    public static $rules = [
        "invoice_code" => "required"
    ];

    public function items(){
        return $this->hasMany("App\item");
    }
}
