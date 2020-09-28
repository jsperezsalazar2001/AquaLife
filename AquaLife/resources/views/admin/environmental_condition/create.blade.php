<!-- Created by: Daniel Felipe Gomez Martinez -->
@extends('layouts.master')

@section("title", $data["title"])

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.environmental_condition.create') }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> {{ __('environmentalCondition_create.title') }}</div>
                <div class="card-body">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>{{ $error }}</strong>
                        </div>
                    @endforeach
                @endif

                <form method="POST" id="create-form" action="{{ route('admin.environmental_condition.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="ph_lr"><strong>{{ __('environmentalCondition_create.label.ph_LR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.ph_LR') }}" name="ph_lr" value="{{ old('ph_lr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.phLrHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="ph_hr"><strong>{{ __('environmentalCondition_create.label.ph_HR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.ph_HR') }}" name="ph_hr" value="{{ old('ph_hr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.phHrHB') }}</small><br />
                        </div>
                    </div><br>
                    <div class="form-row">
                        <div class="col">
                            <label for="temperature_LR"><strong>{{ __('environmentalCondition_create.label.temperature_LR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.temperature_LR') }}" name="temperature_lr" value="{{ old('temperature_lr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.temperatureLrHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="temperature_HR"><strong>{{ __('environmentalCondition_create.label.temperature_HR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.temperature_HR') }}" name="temperature_hr" value="{{ old('temperature_hr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.temperatureHrHB') }}</small><br />
                        </div>
                    </div><br>
                    <div class="form-row">
                        <div class="col">
                            <label for="hardness_LR"><strong>{{ __('environmentalCondition_create.label.hardness_LR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.hardness_LR') }}" name="hardness_lr" value="{{ old('hardness_lr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.hardnessLrHB') }}</small><br />
                        </div>
                        <div class="col">
                            <label for="hardness_HR"><strong>{{ __('environmentalCondition_create.label.hardness_HR') }}</strong></label><br />
                            <input type="number" class="form-control" placeholder="{{ __('environmentalCondition_create.input.hardness_HR') }}" name="hardness_hr" value="{{ old('hardness_hr') }}" min="0.01" step="0.01" aria-describedby="priceHelpBlock" required/>
                            <small id="priceHelpBlock" class="form-text text-muted">{{ __('environmentalCondition_create.label.hardnessHrHB') }}</small><br />
                        </div>
                    </div><br>
                    <div class="form-row justify-content-center">
                        <div class="col" align="center">
                            <input type="submit" value="{{ __('environmentalCondition_create.create') }}" class="btn btn-success"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
