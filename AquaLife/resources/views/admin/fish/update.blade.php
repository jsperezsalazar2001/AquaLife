<!-- Created by: Juan Sebastián Pérez Salazar -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('fish_update.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.fish.update_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['fish']->getId() }}" />
                    <div class="form-row">
                        <div class="col">
                            <label for="name"><strong>{{ __('fish_update.label.name') }}</strong></label><br />
                            <input type="text" class="form-control" name="name" value="{{ $data['fish']->getName() }}" required/>
                        </div>
                        <div class="col">
                            <label for="species"><strong>{{ __('fish_update.label.species') }}</strong></label><br />
                            <input type="text" class="form-control" name="species" value="{{ $data['fish']->getSpecies() }}" required/>
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <label for="family"><strong>{{ __('fish_update.label.family') }}</strong></label><br />
                            <input type="text" class="form-control" name="family" value="{{ $data['fish']->getFamily() }}" required/>
                        </div>
                        <div class="col">
                            <label for="color"><strong>{{ __('fish_update.label.color') }}</strong></label><br />
                            <input type="text" class="form-control" name="color" value="{{ $data['fish']->getColor() }}" required/>
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <label for="price"><strong>{{ __('fish_update.label.price') }}</strong></label><br />
                            <input type="number" class="form-control" name="price" value="{{ $data['fish']->getPrice() }}" min="0.0001" step="0.0001" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('fish_update.label.priceHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="size"><strong>{{ __('fish_update.label.size') }}</strong></label>
                            <select name="size" class="form-control" required>
                                <option value="{{ $data['fish']->getSize() }}">{{ $data["fish"]->getSize() }}</option>
                                @if($data["fish"]->getSize() != "Small")
                                <option value="Small">{{ __('fish_update.size_options.small') }}</option>
                                @endif
                                @if($data["fish"]->getSize() != "Medium")
                                <option value="Medium">{{ __('fish_update.size_options.medium') }}</option>
                                @endif
                                @if($data["fish"]->getSize() != "Large")
                                <option value="Large">{{ __('fish_update.size_options.large') }}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <label for="temperament"><strong>{{ __('fish_update.label.temperament') }}</strong></label>
                            <select name="temperament" class="form-control" required>
                                <option value="{{ $data['fish']->getTemperament() }}">{{ $data["fish"]->getTemperament() }}</option>
                                @if($data["fish"]->getTemperament() != "Passive")
                                <option value="Passive">{{ __('fish_update.temperament_options.passive') }}</option>
                                @endif
                                @if($data["fish"]->getTemperament() != "Agressive")
                                <option value="Agressive">{{ __('fish_update.temperament_options.agressive') }}</option>
                                @endif
                            </select>
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <label for="in_stock"><strong>{{ __('fish_update.label.in_stock') }}</strong></label><br />
                            <input type="number" class="form-control" name="in_stock" value="{{ $data['fish']->getInStock() }}" min="1" aria-describedby="stockHelpBlock" required/>
                            <small id="stockHelpBlock" class="form-text text-muted">{{ __('fish_update.label.stockHB') }}</small><br />
                        </div>
                    </div>
                    
                    <div class="form-row justify-content-center">
                        <div class="col">
                            <div align="center">
                                <label><strong>{{ __('fish_update.current_image') }}</strong></label><br />
                                <img src="{{ asset('/images/'.$data['fish']->getImage()) }}" class="form_image">
                            </div>
                        </div>
                        <div class="col">
                            <label for="new_image"><strong>{{ __('fish_update.label.new_image') }}</strong></label><br />
                            <input type="file" placeholder="{{ __('fish_update.input.image') }}" name="new_image" value="{{ old('new_image') }}" /><br /><br />
                            <input type="hidden" class="form-control" name="image" value="{{ $data['fish']->getImage() }}"/>  
                        </div>
                    </div><br />
                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="{{ __('fish_update.input.update') }}" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
