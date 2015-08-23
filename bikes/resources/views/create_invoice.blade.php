@extends("layouts.default")


@section("content")

    <h1>Creating new invoice</h1>
    {!! Form::open(["route"=>"invoices.store"] ) !!}

    <div>
        {!! Form::label("invoice_code_label", "Invoice code: ") !!}
        {!! Form::input("text", "invoice_code") !!}
        {!! $errors->first("invoice_code","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("customer_name_label", "Customer name: ") !!}
        {!! Form::input("text", "customer_name") !!}
    </div>
    <div>
        {!! Form::label("customer_number_label", "Customer number: ") !!}
        {!! Form::input("text", "customer_number") !!}
    </div>
    <div>
        {!! Form::label("desription_label", "Description: ") !!}
        {!! Form::input("text", "description") !!}
    </div>
    <div>
        {!! Form::submit("Create invoice") !!}
    </div>

    {!! Form::close() !!}
@stop

