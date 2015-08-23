@extends("layouts.default")


@section("content")

    <h1>Creating new invoice for {{$invoice->customer_name}}</h1>
    {!! Form::open(array('method'=>'PATCH', "route"=>array("invoices.update", $invoice->invoice_code)))  !!}

    <div>
        {!! Form::label("invoice_code_label", "Invoice code: ") !!}
        {!! Form::text("invoice_code", $invoice->invoice_code) !!}
        {!! $errors->first("invoice_code","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("customer_name_label", "Customer name: ") !!}
        {!! Form::text("customer_name", $invoice->customer_name) !!}
    </div>
    <div>
        {!! Form::label("customer_number_label", "Customer number: ") !!}
        {!! Form::text("customer_number", $invoice->customer_number) !!}
    </div>
    <div>
        {!! Form::label("desription_label", "Description: ") !!}
        {!! Form::text("description", $invoice->description) !!}
    </div>
    <div>
        {!! Form::submit("Edit invoice") !!}
    </div>

    {!! Form::close() !!}
@stop

