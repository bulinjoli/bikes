<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(InvoiceSeeder::class);

        Model::reguard();
    }
}

class InvoiceSeeder extends Seeder
{

    public function run()
    {
        DB::table("invoice")->delete();
        DB::table("item")->delete();

        $invoices = array(
            array(
                'invoice_code'=>"A123",
                'customer_number'=>"C123",
                'customer_name'=>"Customer 1",
                'description'=>"Bike and accessory",
                'total_net'=>"430",
                'total_gross'=>"500",
                'total_vat'=>"70"
            ),
            array(
                'invoice_code'=>"A124",
                'customer_number'=>"B123",
                'customer_name'=>"Customer 2",
                'description'=>"Bike",
                'total_net'=>"750",
                'total_gross'=>"999",
                'total_vat'=>"249"
            )
        );

        $items = array(
            array(
                'item_code'=>"B1",
                'invoice_id'=>$invoices[0]["invoice_code"],
                'description'=>"Bike",
                'gross'=>"420",
                'net'=>"350",
                'vat'=>"70"
            ),
            array(
                'item_code'=>"B2",
                'invoice_id'=>$invoices[0]["invoice_code"],
                'description'=>"Bike",
                'gross'=>"999",
                'net'=>"750",
                'vat'=>"249"
            ),
            array(
                'item_code'=>"A1",
                'invoice_id'=>$invoices[1]["invoice_code"],
                'description'=>"Helmet",
                'gross'=>"80",
                'net'=>"80",
                'vat'=>"0"
            )
        );

        DB::table("invoice")->insert($invoices);
        DB::table("item")->insert($items);
    }
}






