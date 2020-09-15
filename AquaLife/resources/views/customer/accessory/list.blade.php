<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
            @endif
            <div class="btn-group col-6">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('accessory_list.filter_by') }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('customer.accessory.list_by', ['value'=>'filters']) }}">{{ __('accessory_list.filter.filters') }}</a>
                    <a class="dropdown-item" href="{{ route('customer.accessory.list_by', ['value'=>'ilumination']) }}">{{ __('accessory_list.filter.ilumination') }}</a>
                    <a class="dropdown-item" href="{{ route('customer.accessory.list_by', ['value'=>'heaters']) }}">{{ __('accessory_list.filter.heaters') }}</a>
                    <a class="dropdown-item" href="{{ route('customer.accessory.list_by', ['value'=>'feeders']) }}">{{ __('accessory_list.filter.feeders') }}</a>
                    <a class="dropdown-item" href="{{ route('customer.accessory.list_by', ['value'=>'skimmers']) }}">{{ __('accessory_list.filter.skimmers') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('customer.accessory.list') }}">{{ __('accessory_list.filter.wo_filter') }}</a>
                </div>
            </div><br /><br />

            @if(sizeof($data["accessories"]) < 1)
                <div class="card-deck justify-content-center">
                    <div class="alert alert-primary" role="alert" align="center">
                        {{ __('accessory_list.no_accessories') }}
                    </div>
                </div>
            @else
                @foreach($data["accessories"] as $accessory)
                    @if($loop->index == 0)
                    <div class="card-deck">
                    @endif
                    @if(($loop->index != 0) && ($loop->index)%3 == 0)
                    </div><br />
                    @if(($loop->index) != sizeof($data["accessories"]))
                    <div class="card-deck">
                    @endif
                    @endif
                        <div class="card">
                            <img src="{{ asset('/images/'.$accessory->getImage()) }}" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">{{ $accessory->getName() }}</h5>
                                <p class="card-text"><strong>{{ __('accessory_list.description') }}:</strong> {{ $accessory->getDescription() }}</p>
                                <p class="card-text"><strong>{{ __('accessory_list.price') }}:</strong> {{ $accessory->getPrice() }}</p>
                                @if($accessory->getInStock() > 0)
                                <p class="card-text green-color">{{ __('accessory_list.in_stock') }}</p>
                                @else
                                <p class="card-text red-color">{{ __('accessory_list.sold_out') }}</p>
                                @endif
                                <form method="POST" action="{{ route('customer.accessory.add-to-cart',['id'=> $accessory->getId(), 'type' => 'accessory']) }}" >
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <input type="number" class="form-control col-12" name="quantity" value="1" step="1" min="1" max="{{ $accessory->getInStock() }}" {{ $accessory->getInStock() > 0 ? '' : 'disabled' }} />
                                            <input type="hidden" name="id" value="{{ $accessory->getId() }}" {{ $accessory->getInStock() > 0 ? '' : 'disabled' }} />
                                        </div>
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-info col-12" {{ $accessory->getInStock() > 0 ? '' : 'disabled' }} >{{ __('accessory_show.buy') }} <i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{ $accessory->getCategory() }}</small>
                            </div>
                        </div>
                    @if(($loop->index + 1) == sizeof($data["accessories"]))
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection