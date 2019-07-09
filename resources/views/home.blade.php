@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <div class="card">
                <div class="card-header">
                    Realtime Todolist With Laravel And Vuejs And Socket.IO
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <realtime-todolist-component :auth-user="{{ auth()->user() }}"></realtime-todolist-component>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection