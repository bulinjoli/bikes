<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'item';
    protected $primaryKey = "item_code";
    public $timestamps = false;


    protected $fillable = ['description', 'gross', 'net', 'vat'];


    //protected $hidden = ['item_code', "invoice_id"];

    public static $rules = [
        "item_code" => "required",
        "net" => "required",
        "vat" => "required",
        "gross" => "required"
    ];
    public function invoice(){
        return $this->belongsTo("App\invoice");
    }
}
