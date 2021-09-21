@extends('layout')
@section('title','Nueva Factura')
@section('encabezado','Nueva Factura')

@section('content')

<form action="" method="post">
    @csrf
    <div class="row">
        <div class="col-sm-3">Producto</div>
        <div class="col-sm-3">Cantidad</div>
        <div class="col-sm-3">Precio</div>
        <div class="col-sm-3">Total Producto</div>
    </div>
    <div class="row">
        <div class="col-sm-3">
    <select name="product[]" id="product" class="form-select product">
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
           @endforeach 
    </select>
</div>

<div class="col-sm-3">
    <input type="number"name="quantity[]" class="form-control quantity"min="1"
    value="1">
</div>
<div class="col-sm-3">
    <input type="number" name="price[]" class="form-control price">
</div>
<div class="col-sm-3">
<input typer="text" readonly class="form-control-plaintext totalProduct">
</div>
</div>
</form>
@endsection

@section('scripts')
<script>
    const products =@json($products);
    console.log(products)

    const productList = document.querySelector('.product')
    const priceElement = document.querySelector('.price')
    const quantityElement = document.querySelector('.quantity')
    productList.addEventListener('change', (event) => {
        productId = event.target.value
        productSelected = products.filter( product => product.id == productId)
        priceElement.value = productSelected[0].price
        totalProduct()
    })

    function totalProduct(){
        totalElement = document.querySelector('.totalProduct')
        totalElement.value = priceElement.value * quantityElement.value
    }

    priceElement.addEventListener('input', (event) => {
        totalProduct()
    })

    quantityElement.addEventListener('input', (event) => {
        totalProduct()
    })
</script>
@endsection