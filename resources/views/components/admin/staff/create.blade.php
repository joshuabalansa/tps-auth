@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Staff</h5>
                <form action="{{ route('staff.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Firstname<span class="text-danger">*</span></label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter the name of the item">
                    </div>

                    <div class="mb-3">
                        <label for="product-name" class="form-label">Middle Name<span class="text-danger">*</span></label>
                        <input type="text" name="middlename" class="form-control" placeholder="Enter the name of the item">
                    </div>

                    <div class="mb-3">
                        <label for="product-name" class="form-label">Last Name<span class="text-danger">*</span></label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter the name of the item">
                    </div>

                    <div class="mb-3">
                        <label for="product-description" class="form-label">Address<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="address" rows="3"  placeholder="Add description"></textarea>
                    </div>

                    </div>
                </div> 
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="example-date" class="form-label">Date of birth</label>
                    <input class="form-control" id="example-date" type="date" name="birthdate">
                </div>
                <div class="mb-3">
                    <label for="product-price">Phone<span class="text-danger">*</span></label>
                    <input type="text" maxlength="11" name="phone"  class="form-control"  placeholder="Enter manufacturer's name">
                </div>

                <div class="mb-3">
                    <label for="product-price">Email<span class="text-danger">*</span></label>
                    <input type="text" name="email"  class="form-control"  placeholder="Enter manufacturer's name">
                </div>
                
                <div class="mb-3">
                    <label for="product-price">Salary<span class="text-danger">*</span></label>
                    <input type="text" maxlength="5" name="salary" class="form-control"  placeholder="Enter manufacturer's name">
                </div>
                
                <div class="mb-3">
                    <label for="product-price">Emergency #</label>
                    <input type="text" maxlength="11" name="emergency_number"  class="form-control"  placeholder="Enter manufacturer's name">
                </div>

                <div class="mb-3 col-md-4">
                    <label for="inputState" class="form-label">Role</label>
                    <select name="role" id="inputState" class="form-select">
                        <option>Choose Role</option>
                        <option value="1">Cashier</option>
                        <option value="2">Kitchen</option>
                        <option value="3">Staff</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <a href="{{ route('staff.index') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                            <input type="submit" class="btn w-sm btn-success waves-effect waves-light" value="Save" />
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </form>
@endsection
