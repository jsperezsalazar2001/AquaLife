<!-- Created by: Daniel Felipe Gomez Martinez -->
@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('environmentalCondition_update.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.environmental_condition.update_save') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['environmental_condition']->getId() }}" />
                    <input type="hidden" name="fish_id" value="{{ $data['environmental_condition']->getFishId() }}" />
                    <div class="form-row">
                        <div class="col">
                            <label for="ph_lr"><strong>{{ __('environmentalCondition_update.label.ph_LR') }}</strong></label><br />
                            <input type="number" class="form-control" name="ph_lr" value="{{ $data['environmental_condition']->getPhLR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.phLrHB') }}</small><br />
                        </div>

                        <div class="col">
                            <label for="ph_hr"><strong>{{ __('environmentalCondition_update.label.ph_HR') }}</strong></label><br />
                            <input type="number" class="form-control" name="ph_hr" value="{{ $data['environmental_condition']->getPhHR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.phHrHB') }}</small><br />
                        </div>
                    </div><br />

                    <div class="form-row">
                        <div class="col">
                            <label for="temperature_lr"><strong>{{ __('environmentalCondition_update.label.temperature_LR') }}</strong></label><br />
                            <input type="number" class="form-control" name="temperature_lr" value="{{ $data['environmental_condition']->getTemperatureLR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.temperatureLrHB') }}</small><br />
                        </div>

                        <div class="col">
                            <label for="temperature_hr"><strong>{{ __('environmentalCondition_update.label.temperature_HR') }}</strong></label><br />
                            <input type="number" class="form-control" name="temperature_hr" value="{{ $data['environmental_condition']->getTemperatureHR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.temperatureHrHB') }}</small><br />
                        </div>
                    </div><br />

                    <div class="form-row">
                        <div class="col">
                            <label for="hardness_lr"><strong>{{ __('environmentalCondition_update.label.hardness_LR') }}</strong></label><br />
                            <input type="number" class="form-control" name="hardness_lr" value="{{ $data['environmental_condition']->getHardnessLR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.hardnessLrHB') }}</small><br />
                        </div>

                        <div class="col">
                            <label for="hardness_hr"><strong>{{ __('environmentalCondition_update.label.hardness_HR') }}</strong></label><br />
                            <input type="number" class="form-control" name="hardness_hr" value="{{ $data['environmental_condition']->getHardnessHR() }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_update.label.hardnessHrHB') }}</small><br />
                        </div>
                    </div><br />

                    <div class="form-row">
                        <div class="col">
                            <input type="submit" value="{{ __('environmentalCondition_update.input.update') }}" class="btn btn-primary"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection