
    @extends('layouts.app')
    @section('content')

    {{-- <nav class="navbar navbar-expand-md navbar-dark bg-primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data
                Master</a>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">

                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item col-2 col-md-auto"><a href="{{ route('employees.index') }}"
                            class="nav-link active">Employee List</a></li>
                </ul>

                <hr class="d-lg-none text-white-50">

                <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto"><i
                        class="bi-person-circle me-1"></i> My Profile</a>
            </div>
        </div>
    </nav> --}}

        <div class="container mt-4">
            <div class="row mb-0">
                <div class="col-lg-9 col-xl-6">
                    <h4 class="mb-3">{{ $pageTitle }}</h4>
                </div>
                <div class="col-lg-3 col-xl-6">
                    <ul class="list-inline mb-0 float-end">
                        <li class="list-inline-item">
                            <a href="{{ route('employees.exportExcel') }}" class="btn btn-outline-success">
                                <i class="bi bi-download me-1"></i> to Excel
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('employees.exportPdf') }}" class="btn btn-outline-danger">
                                <i class="bi bi-download me-1"></i> to PDF
                            </a>
                        </li>
                        <li class="list-inline-item">|</li>
                        {{-- <li class="list-inline-item">
                            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-1"></i> Create Employee
                            </a>
                        </li> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createEmployee">
                            <i class="bi bi-plus-circle me-1"></i>Create Employee
                        </button>
                    </ul>
                </div>
             </div>


            <hr>
            <div class="table-responsive border p-3 rounded-3">
                {{-- <table class="table table-bordered table-hover table-striped mb-0 bg-white"> --}}
                    {{-- <table class="table table-bordered table-hover table-striped mb-0 bg-white" id="employeeTable"> --}}
                        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">

                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Position</th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->firstname }}</td>
                                <td>{{ $employee->lastname }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->age }}</td>
                                <td>{{ $employee->position->name }}</td>
                                <td>@include('employee.actions')</td> --}}

                                {{-- <td>
                                    ACTIONS SECTION
                                    <div class="d-flex">
                                    <a href="{{ route('employees.show', ['employee' => $employee->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi-person-lines-fill"></i></a>
                                    <a href="{{ route('employees.edit', ['employee' => $employee->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                    <div>
                                        <form
                                            action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-dark btn-sm me-2"><i
                                                    class="bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                                </td> --}}
                            {{-- </tr>
                        @endforeach
                    </tbody> --}}
                </table>


            </div>
        </div>

        <div class="modal fade" id="createEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="firstName" class="form-label">First Name</label>
                                <input class="form-control @error('firstName') is-invalid @enderror" type="text" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="Enter First Name">
                                @error('firstName')
                                    <div class="text-danger">
                                         <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Enter Last Name">
                                @error('lastName')
                                    <div class="text-danger">
                                         <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                                @error('email')
                                    <div class="text-danger">
                                         <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="age" class="form-label">Age</label>
                                <input class="form-control @error('age') is-invalid @enderror" type="text" name="age" id="age" value="{{ old('age') }}" placeholder="Enter Age">
                                @error('age')
                                    <div class="text-danger">
                                         <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="position" class="form-label">Position</label>
                                <select name="position" id="position" class="form-select">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}" {{ old('position') == $position->id ? 'selected' : '' }}>{{ $position->code.' - '.$position->name }}</option>
                                    @endforeach
                                </select>
                                @error('position')
                                    <div class="text-danger">
                                         <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="cv" class="form-label">
                                     Curriculum Vitae (CV)
                                </label>
                                <input type="file" class="form-control" name="cv" id="cv">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>

        @endsection
        @vite('resources/js/app.js')





