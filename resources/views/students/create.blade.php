<!-- Page header -->
@extends('layout.app')
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <h2 class="page-title">
                    Manage Students
                </h2>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('student.store') }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Add Student</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}"placeholder="Enter Name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="Enter Email">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Roll Number</label>
                                        <input type="text" class="form-control" name="roll_no"
                                            value="{{ old('roll_no') }}" placeholder="Enter Roll Number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Course </label>
                                        <input type="text" class="form-control" name="course"
                                            value="{{ old('course') }}" placeholder="Enter Course">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-success">save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
