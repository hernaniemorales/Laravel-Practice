@extends('layouts.app')

{{-- for title --}}
@section('title', 'Customer List')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Customer List</h1>
            {{-- <p><a href="/customers/create">Add New Customer</a></p> --}}
            <p><a href="{{ route('customers.create') }}">Add New Customer</a></p>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12">
            <form action="/customers" method="POST">
        
                <div class="form-group">
                    <label for="name">Name: </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        <div>  {{ $errors->first('name') }} </div>
                </div>
               
                <div class="form-group">
                    <label for="email">Email: </label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                        <div>  {{ $errors->first('email') }} </div>
                </div>
        
                <div class="form-group">
                    <label for="active">Status: </label>
                    <select name="active" id="active" class="form-control">
                        <option value="" disabled>Select customer status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="company_id">Company </label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}"> {{ $company->name }} </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add Customer</button>
                @csrf
            </form>
        </div>
    </div> --}}

    <hr>

    @foreach ($customers as $customer)
        <div class="row">
            <div class="col-2"> {{ $customer->id }} </div>
            <div class="col-4"> 
                {{-- <a href="/customers/{{ $customer->id }}"> {{ $customer->name }} </a> --}}
                <a href="{{ route('customers.show', ['customer' => $customer]) }}"> {{ $customer->name }} </a>
            </div>
            <div class="col-4"> {{ $customer->company->name }} </div>
            <div class="col-2"> {{ $customer->active }} </div>

        </div> 
    @endforeach

    {{-- <div class="row">
        <div class="col-12">
            @foreach ($companies as $company)
                <h3> {{ $company->name }} </h3>

                <ul>
                    @foreach ($company->customers as $customer)
                        <li> {{ $customer->name }} </li>
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div> --}}

@endsection