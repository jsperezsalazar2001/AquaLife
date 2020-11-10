<!-- Created by: Daniel Felipe Gomez Martinez -->
@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.environmental_condition.show', $data["environmental_condition"]) }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" align="center">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["title"] }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.ph_LR') }}</b><br /> {{ $data["environmental_condition"]->getPhLR() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.ph_HR') }} </b><br /> {{ $data["environmental_condition"]->getPhHR() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.temperature_LR') }} </b><br /> {{ $data["environmental_condition"]->getTemperatureLR() }}<br />
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.temperature_HR') }} </b><br /> {{ $data["environmental_condition"]->getTemperatureHR() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.hardness_LR') }} </b><br /> {{ $data["environmental_condition"]->getHardnessLR() }}<br />
                        </div>
                        <div class="col-4">
                            <b>{{ __('environmental_condition_show.hardness_HR') }} </b><br /> {{ $data["environmental_condition"]->getHardnessHR() }}<br />
                        </div>
                    </div><hr/>
                    <div class="row">
                        <div class="col-12">
                            <b>{{ __('environmental_condition_show.fish') }}</b><br /> {{ $data["fish_name"] }}<br /><br /> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form method="GET" action="{{ route('admin.environmental_condition.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['environmental_condition']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('environmental_condition_show.update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection