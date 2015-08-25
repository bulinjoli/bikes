<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\Item;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        $items = Item::all();

        return view("index", compact("invoices"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view("create_invoice");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), Invoice::$rules);
        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        $invoice = new Invoice;
        $invoice->invoice_code = Input::get("invoice_code");
        $invoice->customer_name = Input::get("customer_name");
        $invoice->customer_number = Input::get("customer_number");
        $invoice->description = Input::get("description");
        $invoice->total_net = "0";
        $invoice->total_gross = "0";
        $invoice->total_vat = "0";
        $invoice->save();
        return Redirect::route("invoices.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view("edit_invoice")->with("invoice", $invoice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);
        return view("edit_invoice")->with("invoice", $invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), Invoice::$rules);
        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        $invoice = Invoice::find($id);
        $invoice->invoice_code = Input::get("invoice_code");
        $invoice->customer_name = Input::get("customer_name");
        $invoice->customer_number = Input::get("customer_number");
        $invoice->description = Input::get("description");
        $invoice->save();
        return Redirect::route("invoices.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        $items = Item::where("invoice_id","=",$invoice->invoice_code)->get();
        foreach($items as $item){
            $item->delete();
        }
        return Redirect::route("invoices.index");
    }
}
