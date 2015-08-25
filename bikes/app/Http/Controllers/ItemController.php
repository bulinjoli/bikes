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

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), Item::$rules);
        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }
        $item = new Item;
        $item->item_code = Input::get("item_code");
        $item->description = Input::get("description");
        $item->net = Input::get("net");
        $item->gross = Input::get("gross");
        $item->vat = Input::get("vat");
        $item->invoice_id = Input::get("invoice_id");
        $item->save();

        $invoice = Invoice::find(Input::get("invoice_id"));
        $invoice->total_vat = strval((int)$invoice->total_vat + (int)Input::get("vat"));
        $invoice->total_net = strval((int)$invoice->total_net + (int)Input::get("net"));
        $invoice->total_gross = strval((int)$invoice->total_gross + (int)Input::get("gross"));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view("edit_item")->with("item", $item);
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
        $validator = Validator::make(Input::all(), Item::$rules);
        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator->messages());
        }

        $item = Item::find($id);

        $invoice = Invoice::find($item->invoice_id);
        $invoice->total_vat = strval((int)$invoice->total_vat - (int)$item->vat + (int)Input::get("vat"));
        $invoice->total_net = strval((int)$invoice->total_net - (int)$item->net + (int)Input::get("net"));
        $invoice->total_gross = strval((int)$invoice->total_gross - (int)$item->gross + (int)Input::get("gross"));
        $invoice->save();

        $item->item_code = Input::get("item_code");
        $item->description = Input::get("description");
        $item->net = Input::get("net");
        $item->gross = Input::get("gross");
        $item->vat = Input::get("vat");

        $item->save();

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
        $item = Item::find($id);

        $invoice = Invoice::find($item->invoice_id);
        $invoice->total_vat = strval((int)$invoice->total_vat - (int)$item->vat);
        $invoice->total_net = strval((int)$invoice->total_net - (int)$item->net);
        $invoice->total_gross = strval((int)$invoice->total_gross - (int)$item->gross);
        $invoice->save();

        $item->delete();
        return Redirect::route("invoices.index");
    }

    public function create_item($id)
    {
        $invoice = Invoice::find($id);
        return view("create_item", compact("invoice"));
        //return view("create_item");
    }
}
