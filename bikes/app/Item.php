<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'item';
    protected $primaryKey = "id";
    public $timestamps = false;


    protected $fillable = ['item_code', 'description', 'gross', 'net', 'vat'];


    //protected $hidden = ['item_code', "invoice_id"];

    public static $rules = [
        "item_code" => "required|unique:item,item_code",
        "net" => "required|numeric|min:0",
        "vat" => "required|numeric|min:0",
        "gross" => "required|numeric|min:0"
    ];
    public function invoice(){
        return $this->belongsTo("App\invoice");
    }
}
