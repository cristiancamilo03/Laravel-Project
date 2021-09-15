@extends('layout')
@section('title','Nueva Factura')
@section('encabezado','Nueva Factura')

@section('content')

<form action="" method="post">
    @csrf

    <select name="product[]" id="product" class="form-select">
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
           @endforeach 
    </select>
    <input type="number"name="quantity[]" >
</form>
@endsection