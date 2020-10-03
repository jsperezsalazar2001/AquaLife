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
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["title"] }}</div>

                <div class="card-body">
                    <b>{{ __('environmental_condition_show.ph_LR') }}</b> {{ $data["environmental_condition"]->getPhLR() }}<br />
                    <b>{{ __('environmental_condition_show.ph_HR') }} </b> {{ $data["environmental_condition"]->getPhHR() }}<br />
                    <b>{{ __('environmental_condition_show.temperature_LR') }} </b> {{ $data["environmental_condition"]->getTemperatureLR() }}<br />
                    <b>{{ __('environmental_condition_show.temperature_HR') }} </b> {{ $data["environmental_condition"]->getTemperatureHR() }}<br />
                    <b>{{ __('environmental_condition_show.hardness_LR') }} </b> {{ $data["environmental_condition"]->getHardnessLR() }}<br />
                    <b>{{ __('environmental_condition_show.hardness_HR') }} </b> {{ $data["environmental_condition"]->getHardnessHR() }}<br />
                    <b>{{ __('environmental_condition_show.fish') }}</b> {{ $data["fish_name"] }}<br /><br /> 
                    <div class="row row-cols-3">
                        <div class="col">
                        <form method="GET" action="{{ route('admin.environmental_condition.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['environmental_condition']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('environmental_condition_show.update') }}</button>
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