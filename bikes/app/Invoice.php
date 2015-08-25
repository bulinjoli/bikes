<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{

    protected $table = 'invoice';
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = ['invoice_code', 'customer_number', 'customer_name', 'description', 'total_net', 'total_gross', 'total_vat'];

    //protected $hidden = ['invoice_code'];

    public static $rules = [
        "invoice_code" => "required|unique:invoice,invoice_code",
    ];

    public function items(){
        return $this->hasMany("App\item");
    }
}
