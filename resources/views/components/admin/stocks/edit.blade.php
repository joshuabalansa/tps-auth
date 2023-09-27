@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Edit</h5>
                <form action="{{ route('stocks.update', $stock->getId()) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Item name<span class="text-danger">*</span></label>
                        <input type="text" value="{{ $stock->getItem() }}" name="item" class="form-control" placeholder="Enter the name of the item">
                    </div>

                    <div class="mb-3">
                        <label for="product-price">Manufacturer<span class="text-danger">*</span></label>
                        <input  name="manufacturer" value="{{ $stock->getManufacturer() }}" type="text" class="form-control"  placeholder="Enter manufacturer's name">
                    </div>
                    
                    <div class="mb-3">
                        <label for="product-description" class="form-label">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="3"  placeholder="Add description">{{ $stock->getDescription() }}</textarea>
                    </div>
                    </div>
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="product-price">Quantity<span class="text-danger">*</span></label>
                    <input  name="quantity" value="{{ $stock->getQuantity() }}" type="number" class="form-control"  placeholder="Enter quantity">
                </div>
            
                <div class="mb-3">
                    <label for="product-price">Unit price<span class="text-danger">*</span></label>
                    <input  name="cost" value="{{ $stock->getCost() }}" type="number" class="form-control"  placeholder="Enter the price per item">
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <a href="{{ route('stocks.index') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                            <input type="submit" class="btn w-sm btn-success waves-effect waves-light" value="Save" />
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </form>
@endsection
