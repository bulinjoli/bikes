@extends("layouts.default")


@section("content")

    <h1>Creating new item</h1>
    {!! Form::open(array('method'=>'PATCH', "route"=>array("invoices.items.update", $item->item_code)))  !!}

    <div>
        {!! Form::label("item_code_label", "Item code: ") !!}
        {!! Form::text("item_code", $item->item_code) !!}
        {!! $errors->first("item_code","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("description_label", "Description: ") !!}
        {!! Form::text("description", $item->description) !!}
    </div>
    <div>
        {!! Form::label("gross_label", "Gross: ") !!}
        {!! Form::text("gross", $item->gross) !!}
        {!! $errors->first("gross","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("net_label", "Net: ") !!}
        {!! Form::text("net", $item->net) !!}
        {!! $errors->first("net","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::label("vat_label", "Vat: ") !!}
        {!! Form::text("vat", $item->vat) !!}
        {!! $errors->first("vat","<span class = 'error'>:message</span") !!}
    </div>
    <div>
        {!! Form::submit("Edit invoice") !!}
    </div>

    {!! Form::close() !!}
@stop

