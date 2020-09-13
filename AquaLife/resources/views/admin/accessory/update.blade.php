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
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('accessory_update.label.name') }}</strong></label><br />
                            <input type="text" class="form-control" name="name" value="{{ $data['accessory']->getName() }}" required/>
                        </div>
                        <div class="col">
                            <label for="category"><strong>{{ __('accessory_update.label.category') }}</strong></label>
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
                            </select>
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <label for="price"><strong>{{ __('accessory_update.label.price') }}</strong></label><br />
                            <input type="number" class="form-control" name="price" value="{{ $data['accessory']->getPrice() }}" min="1" step="0.0001" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('accessory_update.label.priceHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="in_stock"><strong>{{ __('accessory_update.label.in_stock') }}</strong></label><br />
                            <input type="number" class="form-control" name="in_stock" value="{{ $data['accessory']->getInStock() }}" min="1" aria-describedby="stockHelpBlock" required/>
                            <small id="stockHelpBlock" class="form-text text-muted">{{ __('accessory_update.label.stockHB') }}</small><br />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="new_description"><strong>{{ __('accessory_update.label.description') }}</strong></label><br />
                            <textarea class="form-control" name="new_description" placeholder="{{ __('accessory_update.input.description') }}"></textarea><br />
                            <input type="hidden" class="form-control" name="description" value="{{ $data['accessory']->getDescription() }}"/>
                        </div>
                    </div>
                    <div class="form-row justify-content-center">
                        <div class="col">
                            <div align="center">
                                <label><strong>{{ __('accessory_update.current_image') }}</strong></label><br />
                                <img src="{{ asset('/images/'.$data['accessory']->getImage()) }}" class="form_image">
                            </div>
                        </div>
                        <div class="col">
                            <label for="new_image"><strong>{{ __('accessory_update.label.new_image') }}</strong></label><br />
                            <input type="file" placeholder="{{ __('accessory_update.input.image') }}" name="new_image" value="{{ old('new_image') }}" /><br /><br />
                            <input type="hidden" class="form-control" name="image" value="{{ $data['accessory']->getImage() }}"/>  
                        </div>
                    </div><br />
                    <div class="form-row justify-content-center">
                        <div class="col" align="center">
                            <input type="submit" value="{{ __('accessory_update.input.update') }}" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
