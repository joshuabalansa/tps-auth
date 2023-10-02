@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Create Reservation</h5>
                    <form action="{{ route('reservation.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Firstname <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('firstname') }}" name="firstname" id="firstname"
                                class="form-control" placeholder="Enter customer firstname">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Lastname <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('lastname') }}" name="lastname" id="lastname"
                                class="form-control" placeholder="Enter customer lastname">
                        </div>


                        <div class="mb-3">
                            <label for="phone">Phone <span class="text-danger">*</span></label>
                            <input value="{{ old('phone') }}" name="phone" type="text" class="form-control"
                                id="phone" placeholder="Enter phone number">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" name="email" type="text" class="form-control"
                                id="phone" placeholder="Enter email">
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea class="form-control" name="special_request" rows="3" placeholder="Please enter comment"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Reservation Date</label>
                        <input value="{{ old('reservation_date') }}" name="reservation_date" type="date"
                            class="form-control" id="reservation_date">
                    </div>
                    {{-- <div class="mb-3">
                                <label class="mb-2">Status <span class="text-danger">*</span></label>
                                <br/>
                                <div class="radio form-check-inline">
                                    <input type="radio" id="inlineRadio1" value="1" name="status" checked="">
                                    <label for="inlineRadio1"> Available </label>
                                </div>
                                <div class="radio form-check-inline">
                                    <input type="radio" id="inlineRadio3" value="0" name="status">
                                    <label for="inlineRadio3"> Draft </label>
                                </div>
                            </div> --}}
                    <!-- Preview -->

                </div>
            </div> <!-- end col-->

            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-3">
                        <a href="{{ route('reservation.index') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                        <input type="submit" class="btn w-sm btn-success waves-effect waves-light" value="Save" />
                        {{-- <button type="button" class="btn w-sm btn-danger waves-effect waves-light">Delete</button> --}}
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- end col-->
    </div>
    </form>


    <!-- file preview template -->
    <div class="d-none" id="uploadPreviewTemplate">
        <div class="card mt-1 mb-0 shadow-none border">
            <div class="p-2">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                    </div>
                    <div class="col ps-0">
                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>
                        <p class="mb-0" data-dz-size></p>
                    </div>
                    <div class="col-auto">
                        <!-- Button -->
                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                            <i class="dripicons-cross"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
