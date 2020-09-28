<!-- Created by: Daniel Felipe Gomez Martinez -->
@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.environmental_condition.list') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-22">
            <div class="card">
                <div class="card-header"><i class="fa fa-list-ul"></i> {{ __('environmentalCondition_list.title') }}</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('environmentalCondition_list.id') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.ph_LR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.ph_HR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.temperature_LR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.temperature_HR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.hardness_LR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.hardness_HR') }}</th>
                            <th scope="col">{{ __('environmentalCondition_list.about') }} <i class="fa fa-info-circle"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["environmental_condition"] as $environmental_condition)
                        <tr>
                            <td>{{ $environmental_condition->getId() }}</td>
                            <td>{{ $environmental_condition->getPhLR() }}</td>
                            <td>{{ $environmental_condition->getPhHR() }}</td>
                            <td>{{ $environmental_condition->getTemperatureLR() }}</td>
                            <td>{{ $environmental_condition->getTemperatureHR() }}</td>
                            <td>{{ $environmental_condition->getHardnessLR() }}</td>
                            <td>{{ $environmental_condition->getHardnessHR() }}</td>
                            <td><a href="{{ route('admin.environmental_condition.show', ['id'=>$environmental_condition->getId()]) }}"> {{ __('environmentalCondition_list.more') }} <strong>{{ $environmental_condition->getId() }}</strong></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection