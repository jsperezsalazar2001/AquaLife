@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if($errors->any())
                @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $error }}</strong>
            </div>
                @endforeach
            @endif
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fas fa-plus-square"></i> Create fish</div>
                <div class="card-body">

                    <form method="POST" action="{{ route('fish.save') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="species">Species</label>
                            <input type="text" class="form-control" name="species" value="{{ old('species') }}" placeholder="Enter species">
                        </div>
                        <div class="form-group">
                            <label for="family">Family</label>
                            <input type="text" class="form-control" name="family" value="{{ old('family') }}" placeholder="Enter family">
                        </div>
                        <div class="form-group">
                            <label for="color">Color</label>
                            <input type="text" class="form-control" name="color" value="{{ old('color') }}" placeholder="Enter color">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" step="0.0001"class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter price">
                        </div>
                        <label for="size">Size</label>
                        <select class="form-control" name="size">
                            <option value="Small" selected>Small</option>
                            <option value="Medium">Medium</option>
                            <option value="Large">Large</option>
                        </select>

                        <label for="temperament">Temperament</label>
                        <select class="form-control" name="temperament">
                            <option value="Passive" selected>Passive</option>
                            <option value="Agressive">Agressive</option>
                        </select><br/>
                        <input type="submit" value="Create" class="btn btn-success" />
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection