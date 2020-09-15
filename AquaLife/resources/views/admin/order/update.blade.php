<!-- Created by: Yhoan Alejandro Guzman -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('order_update.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.order.update_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['order']->getId() }}" />
                    <div class="form-row">
                        <div class="col">
                            <label for="status"><strong>{{ __('order_update.label.status') }}</strong></label>
                            <select name="status" class="form-control" required>
                                <option value="{{ $data['order']->getStatus() }}">{{ $data["order"]->getStatus() }}</option>
                                @if($data["order"]->getStatus() != "Completed")
                                <option value="Completed">{{ __('order_update.status_options.completed') }}</option>
                                @endif
                                @if($data["order"]->getStatus() != "Delivering")
                                <option value="Delivering">{{ __('order_update.status_options.delivering') }}</option>
                                @endif
                                @if($data["order"]->getStatus() != "Pending")
                                <option value="Pending">{{ __('order_update.status_options.pending') }}</option>
                                @endif
                                @if(($data["order"]->getStatus() != "Canceled") && ($data["order"]->getStatus() != "Completed"))
                                <option value="Canceled">{{ __('order_update.status_options.canceled') }}</option>
                                @endif 
                            </select>
                        </div>
                    </div><br />

                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="{{ __('order_update.input.update') }}" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
