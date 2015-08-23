@extends("layouts.default")


@section("content")

    <h1>Creating new item for </h1>
    {!! Form::open(["route"=>"invoices.items.store"] ) !!}

    <div>
        {!! Form::label("item_code_label", "Item code: ") !!}
        {!! Form::input("text", "item_code") !!}
        {!! $errors->first("item_code","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("description_label", "Description: ") !!}
        {!! Form::input("text", "description") !!}
    </div>
    <div>
        {!! Form::label("gross_label", "Gross: ") !!}
        {!! Form::input("text", "gross") !!}
        {!! $errors->first("gross","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("net_label", "Net: ") !!}
        {!! Form::input("text", "net") !!}
        {!! $errors->first("net","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("vat_label", "Vat: ") !!}
        {!! Form::input("text", "vat") !!}
        {!! $errors->first("vat","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::hidden("invoice_id",$invoice->invoice_code) !!}
    </div>
    <div>
        {!! Form::submit("Create item") !!}
    </div>

    {!! Form::close() !!}
@stop

