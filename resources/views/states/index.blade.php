@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (Session::has('successMessage'))
                <div class="alert alert-success">
                    {{ Session::get('successMessage') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <form action="{{ route('states.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="country_id">Country</label>
                    <select name="country_id" id="country_id">
                        <option value="">Choose</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <h1>states</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Country Name</th>
                        <th>Created At</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($states as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td>{{ $state->name }}</td>
                            <td>{{ $state->country->name }}</td>
                            <td>{{ date('d M, Y', strtotime($state->created_at)) }}</td>
                            <td>
                                <a href="{{ route('states.show', $state->id) }}">View</a>
                            </td>
                            <td>
                                <a href="{{ route('states.edit', $state->id) }}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('states.delete', $state->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
