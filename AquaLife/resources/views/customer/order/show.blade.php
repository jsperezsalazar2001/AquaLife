<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ __('order.user.title') }}</div>

                <div class="card-body">
                    <b>{{ __('order_show.id') }}</b> {{ $data["order"]->getId() }}<br />
                    <b>{{ __('order_show.payment_type') }} </b> {{ $data["order"]->getPaymentType() }}<br />
                    <b>{{ __('order_show.total_price') }} </b> {{ $data["order"]->getTotalPrice() }}<br />
                    <b>{{ __('order_show.status') }} </b> {{ $data["order"]->getStatus() }}<br />
                    <b>{{ __('order_show.created_at') }} </b> {{ $data["order"]->getCreatedAt() }}<br />
                    <b>{{ __('order_show.updated_at') }} </b> {{ $data["order"]->getUpdatedAt() }}<br />
                    <div class="row row-cols-3">
                        <div class="col">
                        <form method="POST" action="{{ route('customer.order.cancel') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['order']->getId() }}" />
                                @if($data["order"]->getStatus() == 'Canceled')
                                <button type="submit" class="btn btn-danger" disabled><i class="fa fa-close"></i> {{ __('order_show.cancel') }}</button>
                                @else
                                <button type="submit" class="btn btn-danger" ><i class="fa fa-close"></i> {{ __('order_show.cancel') }}</button>
                                @endif
                            </form>
                        </div>
                        <div class="col-7"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection