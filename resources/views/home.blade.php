@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="new-class">You are logged in!</div>

                        {{-- text= customizes the button. --}}
                        {{-- pass the data here from the new component --}}
                    <my-button text="My New Text Button" type="submit"></my-button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
