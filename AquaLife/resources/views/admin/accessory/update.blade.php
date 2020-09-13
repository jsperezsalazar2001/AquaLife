<!-- Created by: Juan Sebastián Pérez Salazar -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('accessory_update.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.accessory.update_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['accessory']->getId() }}" />
                    <input type="text" class="form-control" name="name" value="{{ $data['accessory']->getName() }}" required/> <br />
                    <label for="category">{{ __('accessory_update.label.category') }}</label>
                    <select name="category" class="form-control" required>
                        <option value="{{ strtolower($data['accessory']->getCategory()) }}">{{ $data["accessory"]->getCategory() }}</option>
                        @if($data["accessory"]->getCategory() != "filters")
                        <option value="filters">{{ __('accessory_update.input.filters') }}</option>
                        @endif
                        @if($data["accessory"]->getCategory() != "ilumination")
                        <option value="ilumination">{{ __('accessory_update.input.ilumination') }}</option>
                        @endif
                        @if($data["accessory"]->getCategory() != "heaters")
                        <option value="heaters">{{ __('accessory_update.input.heaters') }}</option>
                        @endif
                        @if($data["accessory"]->getCategory() != "feeders")
                        <option value="feeders">{{ __('accessory_update.input.feeders') }}</option>
                        @endif
                        @if($data["accessory"]->getCategory() != "skimmers")
                        <option value="skimmers">{{ __('accessory_update.input.skimmers') }}</option>
                        @endif
                    </select><br />
                    <input type="number" class="form-control" name="price" value="{{ $data['accessory']->getPrice() }}" min="1" step="0.0001" aria-describedby="priceHelpBlock" required/>
                    <small id="priceHelpBlock" class="form-text text-muted">{{ __('accessory_update.label.priceHB') }}</small><br />
                    <input type="number" class="form-control" name="in_stock" value="{{ $data['accessory']->getInStock() }}" min="1" aria-describedby="stockHelpBlock" required/>
                    <small id="stockHelpBlock" class="form-text text-muted">{{ __('accessory_update.label.stockHB') }}</small><br />
                    <textarea class="form-control" name="new_description" placeholder="{{ __('accessory_update.input.description') }}"></textarea><br />
                    <input type="hidden" class="form-control" name="description" value="{{ $data['accessory']->getDescription() }}"/>
                    <input type="file" placeholder="{{ __('accessory_update.input.image') }}" name="new_image" value="{{ old('new_image') }}" /><br /><br />
                    <input type="hidden" class="form-control" name="image" value="{{ $data['accessory']->getImage() }}"/>
                    <input type="submit" value="{{ __('accessory_update.input.update') }}" class="btn btn-primary"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
