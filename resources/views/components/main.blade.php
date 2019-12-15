@extends('layouts.app')

@section('content')
    @include('partials.modal')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                       {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('partials.sweetalert_messages')
@endsection
