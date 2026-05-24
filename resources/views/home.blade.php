@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Anda telah login!') }}
                    <p>Selamat datang di aplikasi Akademik! Di sini Anda dapat membuat dan mengelola data akademik Anda dengan mudah. Gunakan menu di atas untuk mulai menambahkan Data baru </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
