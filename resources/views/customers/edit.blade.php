@extends('layouts.app')

{{-- for title --}}
@section('title', 'Edit Details for ' . $customer->name )

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit Details for {{ $customer->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            {{-- <form action="/customers/{{ $customer->id }}" method="POST"> --}}
                <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
                @method('PATCH')
                @include('customers.form')
                
                <button type="submit" class="btn btn-primary mt-3">Save Customer</button>
            </form>
        </div>
    </div>

@endsection