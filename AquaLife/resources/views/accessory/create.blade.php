@extends('layouts.master')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header"><i class="fa fa-plus"></i> Create accessory</div>
                <div class="card-body">
                @if($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <form method="POST" action="{{ route('accessory.save') }}">
                    @csrf
                    <input type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" /> <br /><br />
                    <label for="category">Category</label>
                    <select name="category">
                        <option value="filters" selected>filters</option>
                        <option value="ilumination">ilumination</option>
                        <option value="heaters">heaters</option>
                        <option value="feeders">feeders</option>
                        <option value="skimmers">skimmers</option>
                    </select><br /><br />
                    <input type="text" placeholder="Enter price" name="price" value="{{ old('price') }}" /><br /><br />
                    <input type="submit" value="Create" class="btn btn-success"/>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
