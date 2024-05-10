@extends('layouts.app')

@section('title', 'List')

@section('content')

<div class="container">

    <div class="card">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-header">
            <h3>List of Students</h3>
            <div class="row">
                <form action="{{ route('home') }}" method="GET">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                </form>

                <a class="btn btn-primary newstudent" href="{{ route('add.student') }}">Add New Student</a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="list_tasks" class="table" style="width: max-content;">
                    <thead>
                        <tr>
                            <th><a href="{{ route('home', ['sort_by' => 'id']) }}">Id</th>
                            <th><a href="{{ route('home', ['sort_by' => 'name']) }}">Name</a></th>
                            <th><a href="{{ route('home', ['sort_by' => 'email']) }}">Email</a></th>
                            <th><a href="{{ route('home', ['sort_by' => 'phone']) }}">Phone</a></th>
                            <th><a href="{{ route('home', ['sort_by' => 'dob']) }}">DOB</th>
                            <th><a href="{{ route('home', ['sort_by' => 'doj']) }}">DOJ</th>
                            <th><a href="{{ route('home', ['sort_by' => 'father_name']) }}">Father Name</th>
                            <th><a href="{{ route('home', ['sort_by' => 'mother_name']) }}">Mother Name</th>
                            <th><a href="{{ route('home', ['sort_by' => 'address']) }}">Address</th>
                            <th><a href="{{ route('home', ['sort_by' => 'roll_no']) }}">Roll No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student as $students)
                        <tr>
                            <td>{{ $students->id }}</td>
                            <td>{{ $students->name }}</td>
                            <td>{{ $students->email }}</td>
                            <td>{{ $students->phone }}</td>
                            <td>{{ $students->dob }}</td>
                            <td>{{ $students->doj }}</td>
                            <td>{{ $students->father_name }}</td>
                            <td>{{ $students->mother_name }}</td>
                            <td>{{ $students->address }}</td>
                            <td>{{ $students->roll_no }}</td>
                            <td>
                                <a href="{{ route('students.edit', $students->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('students.destroy', $students->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-center">
                    {{ $student->links() }}
                </ul>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('footer')