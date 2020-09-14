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
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_create.label.name') }}</strong></label><br />
                            <input type="text" class="form-control" placeholder="{{ __('accessory_create.input.name') }}" name="name" value="{{ old('name') }}" required/> <br />
                        </div>
                        <div class="col">
                            <label for="category"><strong>{{ __('accessory_create.label.category') }}</strong></label>
                            <select name="category" class="form-control" required>
                                <option value="filters" selected>{{ __('accessory_create.input.filters') }}</option>
                                <option value="ilumination">{{ __('accessory_create.input.ilumination') }}</option>
                                <option value="heaters">{{ __('accessory_create.input.heaters') }}</option>
                                <option value="feeders">{{ __('accessory_create.input.feeders') }}</option>
                                <option value="skimmers">{{ __('accessory_create.input.skimmers') }}</option>
                            </select><br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_create.label.price') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('accessory_create.input.price') }}" name="price" value="{{ old('price') }}" min="0.0001" step="0.0001" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('accessory_create.label.priceHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_create.label.in_stock') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('accessory_create.input.stock') }}" name="in_stock" value="{{ old('in_stock') }}" min="1" aria-describedby="stockHelpBlock" required/>
                            <small id="stockHelpBlock" class="form-text text-muted">{{ __('accessory_create.label.stockHB') }}</small><br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_create.label.description') }}</strong></label><br />
                            <textarea class="form-control" placeholder="{{ __('accessory_create.input.description') }}" name="description" id="description" value="{{ old('description') }}" required></textarea><br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_create.label.image') }}</strong></label><br />
                            <input type="file" placeholder="{{ __('accessory_create.input.image') }}" name="image" value="{{ old('image') }}" required/><br /><br />
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col" align="center">
                            <input type="submit" value="{{ __('accessory_create.input.create') }}" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
