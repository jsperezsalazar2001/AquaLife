<!-- Created by: Juan Sebastián Pérez Salazar -->

@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-list-ul"></i> {{ __('accessory_list.title') }}</div>

                <div class="card-body">
                    @foreach($data["accessories"] as $accessory)
                        <label>
                            {{ $accessory->getId() }} - {{ $accessory->getName() }} :
                        </label><strong><a href="{{ route('admin.accessory.show', ['id'=>$accessory->getId()]) }}"> {{ __('accessory_list.info') }} <i class="fa fa-info"></i> </a></strong> <br />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
