<!-- Created by: Daniel Felipe Gomez Martinez -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data["fish"] as $fish)
                @if($loop->index == 0)
                <div class="card-deck">
                @endif
                @if(($loop->index != 0) && ($loop->index)%3 == 0)
                </div><br />
                @if(($loop->index) != sizeof($data["fish"]))
                <div class="card-deck">
                @endif
                @endif
                    <div class="card">
                        <img src="{{ asset('/images/'.$fish->getImage()) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $fish->getName() }}</h5>
                            <p class="card-text"><strong>{{ __('fish_show.color') }}</strong> {{ $fish->getColor() }}</p>
                            <p class="card-text"><strong>{{ __('fish_show.size') }}</strong> {{ $fish->getSize() }}</p>
                            <p class="card-text"><strong>{{ __('fish_show.temperament') }}</strong> {{ $fish->getTemperament() }}</p>
                            <p class="card-text"><strong>{{ __('fish_show.price') }}</strong> {{ $fish->getPrice() }}</p>
                            @if($fish->getInStock() > 0)
                            <p class="card-text green-color">{{ __('fish_list.in_stock') }}</p>
                            @else
                            <p class="card-text red-color">{{ __('fish_list.sold_out') }}</p>
                            @endif
                            <form method="POST" action="{{ route('customer.wishList.delete') }}">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id" value="{{ $fish->getId() }}" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> {{ __('wishListFish.delete') }}</button>
                                    </div>
                                </div>
                            </form><br/>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $fish->getSpecies() }}</small>
                        </div>
                    </div>
                @if(($loop->index + 1) == sizeof($data["fish"]))
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection