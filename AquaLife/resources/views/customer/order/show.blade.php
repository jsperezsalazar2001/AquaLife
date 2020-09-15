<!-- Created by: Juan Sebastián Pérez Salazar -->

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
                    @if($data["order"]->getStatus() == "Completed")
                        <b>{{ __('order_show.status') }} </b><strong class="order-completed"><i class="fa fa-check"></i> {{ $data["order"]->getStatus() }} </strong><br />
                    @elseif($data["order"]->getStatus() == "Pending")
                        <b>{{ __('order_show.status') }} </b><strong class="order-pending"><i class="fa fa-clock"></i> {{ $data["order"]->getStatus() }} </strong><br />
                    @elseif($data["order"]->getStatus() == "Delivering")
                        <b>{{ __('order_show.status') }} </b><strong class="order-delivering"><i class="fa fa-truck"></i> {{ $data["order"]->getStatus() }} </strong><br />
                    @elseif($data["order"]->getStatus() == "Canceled")
                        <b>{{ __('order_show.status') }} </b><strong class="order-canceled"><i class="fa fa-times"></i> {{ $data["order"]->getStatus() }} </strong><br />
                    @endif
                    <b>{{ __('order_show.created_at') }} </b> {{ $data["order"]->getCreatedAt() }}<br />
                    <b>{{ __('order_show.updated_at') }} </b> {{ $data["order"]->getUpdatedAt() }}<br /><br />
                    @if(!empty($data["fish"]) and count($data["fish"]) > 0)
                    <b>{{ __('order_show.fish_ordered') }} </b><br />
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('fish_list.name') }}</th>
                                <th scope="col">{{ __('fish_list.price') }}</th>
                                <th scope="col">{{ __('order_show.quantity') }}</th>
                                <th scope="col">{{ __('order_list.subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["fish"] as $fish)
                            <tr>
                                <td>{{ $fish['name'] }}</td>
                                <td>{{ $fish['price'] }}</td>
                                <td>{{ $fish['quantity'] }}</td>
                                <td>{{ $fish['subtotal'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <br />
                    @if(!empty($data["accessories"]) and count($data["accessories"]) > 0)
                    <b>{{ __('order_show.accessories_ordered') }} </b><br />
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('accessory_list.name') }}</th>
                                <th scope="col">{{ __('accessory_list.price') }}</th>
                                <th scope="col">{{ __('order_show.quantity') }}</th>
                                <th scope="col">{{ __('order_list.subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["accessories"] as $accessory)
                            <tr>
                                <td>{{ $accessory['name'] }}</td>
                                <td>{{ $accessory['price'] }}</td>
                                <td>{{ $accessory['quantity'] }}</td>
                                <td>{{ $accessory['subtotal'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row row-cols-3">
                        <div class="col">
                        <form method="POST" action="{{ route('customer.order.cancel') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['order']->getId() }}" />
                                @if(($data["order"]->getStatus() == 'Canceled') || ($data["order"]->getStatus() == 'Delivering') || ($data["order"]->getStatus() == 'Completed'))
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