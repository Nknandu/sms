<!-- Page header -->
@extends('layout.app')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Welcome {{ Auth::user()->name }}</h3>
                        </div>
                        <div class="card-body">Email :- {{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <!-- Content here -->
        </div>
    </div>
@endsection
