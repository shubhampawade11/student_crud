@extends('layouts.app')

@section('title', 'Add New Student')

@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">
                        <div class="card-body">

                            <h5 class="card-title">Add New Student</h5>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="/students" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" name="name" type="text" placeholder="Enter Your Student Name" class="form-control">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" name="email" type="email" placeholder="Enter Your Email" class="form-control">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input id="phone" name="phone" type="text" placeholder="Enter Your Phone Number" class="form-control">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" name="dob" type="date" class="form-control">
                                    @error('dob')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="doj">Date of Joining</label>
                                    <input id="doj" name="doj" type="date" class="form-control">
                                    @error('doj')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fname">Father's Name</label>
                                    <input id="fname" name="father_name" type="text" placeholder="Enter Your Father's Name" class="form-control">
                                    @error('father_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mname">Mother's Name</label>
                                    <input id="mname" name="mother_name" type="text" placeholder="Enter Your Mother's Name" class="form-control">
                                    @error('mother_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea id="address" name="address" rows="4" class="form-control"></textarea>
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="rollno">Roll No</label>
                                    <input id="rollno" name="roll_no" type="text" placeholder="Enter Your Roll No" class="form-control">
                                    @error('roll_no')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')