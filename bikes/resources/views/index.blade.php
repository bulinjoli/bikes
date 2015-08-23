@extends("layouts.default")


@section("content")
<div class="container">
    <div class="content">
<h1>Invoices</h1>
        @foreach($invoices as $invoice)
            <div class="invoice">
                <ul>
                    <li>Invoice code: {{$invoice->invoice_code}}</li>
                    <li>Customer nummber: {{$invoice->customer_number}}</li>
                    <li>Customer name: {{$invoice->customer_name}}</li>
                    <li>Description: {{$invoice->description}}</li>
                    <li>Total net: {{$invoice->total_net}}</li>
                    <li>Total gross: {{$invoice->total_gross}}</li>
                    <li>Total vat: {{$invoice->total_vat}}</li>
                </ul>

                    @foreach($invoice->items as $item)
                    <div class = "item">
                        <ul>
                            <li>Item code: {{$item->item_code}}</li>
                            <li>Item description: {{$item->description}}</li>
                            <li>Item gross: {{$item->gross}}</li>
                            <li>Item net: {{$item->net}}</li>
                            <li>Item vat: {{$item->vat}}</li>
                            <li>{!! link_to("/invoices/items/{$item->item_code}/edit", "Edit item") !!}</li>
                            <li>{!! Form::open(array('route' => array('invoices.items.destroy', $item->item_code), 'method' => 'delete')) !!}
                            <button type="submit" class="btn">Delete Item</button>
                            {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                    @endforeach
                <div class="buttons">
                    <ul>
                        <li>{!! link_to("/invoices/items/create_item/{$invoice->invoice_code}", "Add item") !!}</li>
                        <li>{!! link_to("/invoices/{$invoice->invoice_code}/edit", "Edit invoice") !!}</li>

                        <!-- <li>{!! link_to_route('invoices.destroy', 'Delete invoice', $invoice->invoice_code, ['data-method'=>'delete']) !!}</li>-->

                        {!! Form::open(array('route' => array('invoices.destroy', $invoice->invoice_code), 'method' => 'delete')) !!}
                            <button type="submit" class="btn">Delete Invoice</button>
                        {!! Form::close() !!}

                    </ul>
                </div>
            </div>
        @endforeach
        <div class="button">
            {!! link_to("/invoices/create", "add invoice") !!}
        </div>
    </div>
</div>
@stop

