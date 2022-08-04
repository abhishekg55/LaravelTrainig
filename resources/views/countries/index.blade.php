@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('countries.store') }}" method="post">
                @csrf
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
            <h1>Countries</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Short Name</th>
                        <th>States</th>
                        <th>Created At</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($countries as $country)
                        <tr>
                            <td>{{ $country->id }}</td>
                            <td>{{ $country->all_caps }}</td>
                            <td>{{ $country->short_name }}</td>
                            <td>
                                <ul>
                                    @foreach ($country->states as $state)
                                        <li>{{ $state->name }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>{{ date('d M, Y', strtotime($country->created_at)) }}</td>
                            <td>
                                <a href="{{ route('countries.show', $country->id) }}">View</a>
                            </td>
                            <td>
                                <a href="{{ route('countries.edit', $country->id) }}">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('countries.delete', $country->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
