<!-- Created by: Yhoan Alejandro Guzman -->

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
            <div class="row">
                <div class="btn-group col">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('order_list.filter_by_status') }}
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('customer.order.list_by_status', ['value'=>'Completed']) }}">{{ __('order_list.filter.completed') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.order.list_by_status', ['value'=>'Canceled']) }}">{{ __('order_list.filter.canceled') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.order.list_by_status', ['value'=>'Delivering']) }}">{{ __('order_list.filter.delivering') }}</a>
                        <a class="dropdown-item" href="{{ route('customer.order.list_by_status', ['value'=>'Pending']) }}">{{ __('order_list.filter.pending') }}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('customer.order.list') }}">{{ __('order_list.filter.wo_filter') }}</a>
                    </div>
                </div>
            </div><br />
            @if(sizeof($data["order"]) < 1)
                <div class="card-deck justify-content-center">
                    <div class="alert alert-primary" role="alert" align="center">
                        {{ __('order_list.no_orders') }}
                    </div>
                </div>
            @else
            <div class="card bg-light">
                <div class="card-header c-header"><i class="fa fa-list-ul"></i> {{ __('order_list.title') }}</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('order_list.id') }}</th>
                            <th scope="col">{{ __('order_list.total_price') }}</th>
                            <th scope="col">{{ __('order_list.status') }}</th>
                            <th scope="col">{{ __('order_list.created_at') }}</th>
                            <th scope="col">{{ __('order_list.about') }} <i class="fa fa-info-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["order"] as $order)
                        <tr>
                            <td>{{ $order->getId() }}</td>
                            <td>{{ $order->getTotalPrice() }}</td>
                            @if($order->getStatus() == "Completed")
                                <td class="order-completed"><i class="fa fa-check"></i> {{ $order->getStatus() }}</td>
                            @elseif($order->getStatus() == "Pending")
                                <td class="order-pending"><i class="fa fa-clock"></i> {{ $order->getStatus() }}</td>
                            @elseif($order->getStatus() == "Delivering")
                                <td class="order-delivering"><i class="fa fa-truck"></i> {{ $order->getStatus() }}</td>
                            @elseif($order->getStatus() == "Canceled")
                                <td class="order-canceled"><i class="fa fa-times"></i> {{ $order->getStatus() }}</td>
                            @endif
                            <td>{{ $order->getCreatedAt() }}</td>
                            <td><a href="{{ route('customer.order.show', ['id'=>$order->getId()]) }}"> {{ __('order_list.more') }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection