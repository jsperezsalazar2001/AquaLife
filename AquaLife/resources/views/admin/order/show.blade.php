<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.order.show', $data["order"]) }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ __('order_show.id') }} {{ $data["order"]->getId() }}</div>

                <div class="card-body">
                    <b>{{ __('order_show.id') }}</b> {{ $data["order"]->getId() }}<br />
                    <a href="{{ route('admin.user.show', ['id'=>$data['order']->getUserId()]) }}"><b>{{ __('order_show.user_id') }} </b> {{ $data["order"]->getUserId() }}<br /></a>
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
                    <b>{{ __('order_show.updated_at') }} </b> {{ $data["order"]->getUpdatedAt() }}<br />
                    @if(!empty($data["fish"]) and count($data["fish"]) > 0)
                    <br />
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
                            @foreach($data["fish"] as $fishOrder)
                            <tr>
                                <td>{{ $fishOrder->fish->getName() }}sf</td>
                                <td>{{ $fishOrder->fish->getPrice() }}</td>
                                <td>{{ $fishOrder->getquantity() }}</td>
                                <td>{{ $fishOrder->getSubtotal() }}</td>
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
                            @foreach($data["accessories"] as $accessoryOrder)
                            <tr>
                                <td>{{ $accessoryOrder->accessory->getName() }}</td>
                                <td>{{ $accessoryOrder->accessory->getPrice() }}</td>
                                <td>{{ $accessoryOrder->getquantity() }}</td>
                                <td>{{ $accessoryOrder->getSubtotal() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row row-cols-3">
                        <div class="col">
                        <form method="GET" action="{{ route('admin.order.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['order']->getId() }}" />
                                @if($data["order"]->getStatus() == 'Canceled')
                                    <button type="submit" class="btn btn-primary" disabled><i class="fa fa-pencil-alt"></i> {{ __('order_show.update') }}</button>
                                @else
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('order_show.update') }}</button>
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