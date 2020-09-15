@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-info-circle"></i> {{ $data["title"] }}</div>

                <div class="card-body">
                    <b>{{ __('environmentalCondition_show.ph_LR') }}</b> {{ $data["environmental_condition"]->getPhLR() }}<br />
                    <b>{{ __('environmentalCondition_show.ph_HR') }} </b> {{ $data["environmental_condition"]->getPhHR() }}<br />
                    <b>{{ __('environmentalCondition_show.temperature_LR') }} </b> {{ $data["environmental_condition"]->getTemperatureLR() }}<br />
                    <b>{{ __('environmentalCondition_show.temperature_HR') }} </b> {{ $data["environmental_condition"]->getTemperatureHR() }}<br />
                    <b>{{ __('environmentalCondition_show.hardness_LR') }} </b> {{ $data["environmental_condition"]->getHardnessLR() }}<br />
                    <b>{{ __('environmentalCondition_show.hardness_HR') }} </b> {{ $data["environmental_condition"]->getHardnessHR() }}<br />
                    <b>{{ __('environmentalCondition_show.fish') }}</b> {{ $data["fish_name"] }}<br /><br /> 
                    <div class="row row-cols-3">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.environmentalCondition.delete') }}">
                                 @csrf
                                <input type="hidden" name="id" value="{{ $data['environmental_condition']->getId() }}" />
                             <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i> {{ __('environmentalCondition_show.delete') }}</button>
                            </form>
                        </div>
                        <div class="col">
                        <form method="GET" action="{{ route('admin.environmentalCondition.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data['environmental_condition']->getId() }}" />
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt"></i> {{ __('environmentalCondition_show.update') }}</button>
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