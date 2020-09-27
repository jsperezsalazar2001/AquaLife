<!-- Created by: Yhoan Alejandro Guzman -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if($errors->any())
                @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $error }}</strong>
            </div>
                @endforeach
            @endif
            @include('util.message')
            <div class="card">
            <div class="card-header"><i class="fa fa-plus"></i> {{ __('fish_create.title') }}</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.fish.save') }}" id="create-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="name"><strong>{{ __('fish_create.label.name') }}</strong></label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{ __('fish_create.input.enter_name') }}">
                            </div>
                            <div class="col">
                                <label for="species"><strong>{{ __('fish_create.label.species') }}</strong></label>
                                <input type="text" class="form-control" name="species" value="{{ old('species') }}" placeholder="{{ __('fish_create.input.enter_species') }}">
                            </div>
                        </div><br/>
                        <div class="form-row">
                            <div class="col">
                                <label for="family"><strong>{{ __('fish_create.label.family') }}</strong></label>
                                <input type="text" class="form-control" name="family" value="{{ old('family') }}" placeholder="{{ __('fish_create.input.enter_family') }}">
                            </div>
                            <div class="col">
                                <label for="color"><strong>{{ __('fish_create.label.color') }}</strong></label>
                                <input type="text" class="form-control" name="color" value="{{ old('color') }}" placeholder="{{ __('fish_create.input.enter_color') }}">
                            </div>
                        </div><br/>
                        <div class="form-row">
                            <div class="col">
                                <label for="price"><strong>{{ __('fish_create.label.price') }}</strong></label>
                                <input type="number" min="0.0001" step="0.0001"class="form-control" name="price" value="{{ old('price') }}" placeholder="{{ __('fish_create.input.enter_price') }}" aria-describedby="priceHelpBlock" required>
                                <small id="priceHelpBlock" class="form-text text-muted">{{ __('fish_create.label.priceHB') }}</small><br />
                            </div>
                            <div class="col">
                                <label for="in_stock"><strong>{{ __('fish_create.label.stock') }}</strong></label>
                                <input type="number" class="form-control" placeholder="{{ __('fish_create.input.enter_stock') }}" name="in_stock" value="{{ old('in_stock') }}" min="1" aria-describedby="stockHelpBlock" required/>
                                <small id="stockHelpBlock" class="form-text text-muted">{{ __('fish_create.label.stockHB') }}</small><br />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="temperament"><strong>{{ __('fish_create.label.temperament') }}</strong></label>
                                <select class="form-control" name="temperament">
                                    <option value="Passive" selected>{{ __('fish_create.temperament_options.passive') }}</option>
                                    <option value="Agressive">{{ __('fish_create.temperament_options.agressive') }}</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="size"><strong>{{ __('fish_create.label.size') }}</strong></label>
                                <select class="form-control" name="size">
                                    <option value="Small" selected>{{ __('fish_create.size_options.small') }}</option>
                                    <option value="Medium">{{ __('fish_create.size_options.medium') }}</option>
                                    <option value="Large">{{ __('fish_create.size_options.large') }}</option>
                                </select>
                            </div>
                        </div><br />
                        <div class="form-row">
                            <div class="col">
                                <label for="name"><strong>{{ __('fish_create.label.image') }}</strong></label><br />
                                <input type="file" placeholder="{{ __('fish_create.input.select_image') }}" name="image" value="{{ old('image') }}" required/><br /><br/>
                            </div>
                            <div class="col">
                                <label for="size"><strong>{{ __('fish_create.label.envoronmental_condition') }}</strong></label>
                                <select class="form-control" name="environmental_condition_id">
                                    @foreach($data["environmental_condition"] as $environmental_condition)
                                       <option  value="{{$environmental_condition->getId()}}"  selected> {{ $environmental_condition->getId() }}
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.ph_LR') }}</b> {{ $environmental_condition->getPhLR() }}  </option>
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.ph_HR') }} </b> {{ $environmental_condition->getPhHR() }}</option>
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.temperature_LR') }} </b> {{ $environmental_condition->getTemperatureLR() }}</option>
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.temperature_HR') }} </b> {{ $environmental_condition->getTemperatureHR() }}</option>
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.hardness_LR') }} </b> {{ $environmental_condition->getHardnessLR() }}</option>
                                        <option disabled><b>{{ __('fish_create.environmental_conditions.hardness_HR') }} </b> {{ $environmental_condition->getHardnessHR() }}</option>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br>
                        <div class="form-row justify-content-center">
                            <div class="col" align="center">
                                <input type="submit" value="{{ __('fish_create.input.create') }}" class="btn btn-success" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection