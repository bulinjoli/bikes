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
         $this->call(ItemSeeder::class);

        Model::reguard();
    }
}

class InvoiceSeeder extends Seeder
{

    public function run()
    {
        DB::table("invoice")->delete();

        $invoices = array(
            array(
                'invoice_code'=>"A123",
                'customer_number'=>"C123",
                'customer_name'=>"Customer 1",
                'description'=>"Bike and accessory",
                'total_net'=>"1100",
                'total_gross'=>"1419",
                'total_vat'=>"319"
            ),
            array(
                'invoice_code'=>"A124",
                'customer_number'=>"B123",
                'customer_name'=>"Customer 2",
                'description'=>"Bike",
                'total_net'=>"80",
                'total_gross'=>"80",
                'total_vat'=>"0"
            )
        );

        DB::table("invoice")->insert($invoices);
    }
}

class ItemSeeder extends Seeder
{

    public function run()
    {
        DB::table("item")->delete();

        $items = array(
            array(
                'item_code'=>"B1",
                'invoice_id'=>DB::table("invoice")->first()->id,
                'description'=>"Bike",
                'gross'=>"420",
                'net'=>"350",
                'vat'=>"70"
            ),
            array(
                'item_code'=>"B2",
                'invoice_id'=>DB::table("invoice")->first()->id,
                'description'=>"Bike",
                'gross'=>"999",
                'net'=>"750",
                'vat'=>"249"
            ),
            array(
                'item_code'=>"A1",
                'invoice_id'=>DB::table("invoice")->where('invoice_code', "A124")->first()->id,
                'description'=>"Helmet",
                'gross'=>"80",
                'net'=>"80",
                'vat'=>"0"
            )
        );
        DB::table("item")->insert($items);
    }
}






