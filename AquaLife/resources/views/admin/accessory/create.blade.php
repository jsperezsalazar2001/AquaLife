<!-- Created by: Juan Sebastián Pérez Salazar -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('accessory_create.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" id="create-form" action="{{ route('admin.accessory.save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="form-control" placeholder="{{ __('accessory_create.input.name') }}" name="name" value="{{ old('name') }}" required/> <br />
                    <label for="category">{{ __('accessory_create.label.category') }}</label>
                    <select name="category" class="form-control" required>
                        <option value="filters" selected>{{ __('accessory_create.input.filters') }}</option>
                        <option value="ilumination">{{ __('accessory_create.input.ilumination') }}</option>
                        <option value="heaters">{{ __('accessory_create.input.heaters') }}</option>
                        <option value="feeders">{{ __('accessory_create.input.feeders') }}</option>
                        <option value="skimmers">{{ __('accessory_create.input.skimmers') }}</option>
                    </select><br />
                    <input type="number" class="form-control" placeholder="{{ __('accessory_create.input.price') }}" name="price" value="{{ old('price') }}" min="1" step="0.0001" aria-describedby="priceHelpBlock" required/>
                    <small id="priceHelpBlock" class="form-text text-muted">{{ __('accessory_create.label.priceHB') }}</small><br />
                    <input type="number" class="form-control" placeholder="{{ __('accessory_create.input.stock') }}" name="in_stock" value="{{ old('in_stock') }}" min="1" aria-describedby="stockHelpBlock" required/>
                    <small id="stockHelpBlock" class="form-text text-muted">{{ __('accessory_create.label.stockHB') }}</small><br />
                    <textarea class="form-control" placeholder="{{ __('accessory_create.input.description') }}" name="description" id="description" value="{{ old('description') }}" required></textarea><br />
                    <input type="file" placeholder="{{ __('accessory_create.input.image') }}" name="image" value="{{ old('image') }}" required/><br /><br />
                    <input type="submit" value="{{ __('accessory_create.input.create') }}" class="btn btn-success"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
