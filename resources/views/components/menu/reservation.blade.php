<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Reserve a table</h5>
                        <form action="{{ route('reserve.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Firstname <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ old('firstname') }}" name="firstname" id="firstname"
                                    class="form-control" placeholder="Enter customer firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname <span
                                        class="text-danger">*</span></label>
                                <input type="text" value="{{ old('lastname') }}" name="lastname" id="lastname"
                                    class="form-control" placeholder="Enter customer lastname" required>
                            </div>


                            <div class="mb-3">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input value="{{ old('phone') }}" maxlength="11" name="phone" type="text"
                                    class="form-control" id="phone" placeholder="Enter phone number" required>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input value="{{ old('email') }}" name="email" type="email" class="form-control"
                                    id="phone" placeholder="Enter email">
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Special Request</label>
                            <textarea class="form-control" name="special_request" rows="3" placeholder="Please enter comment"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Reservation Date</label>
                            <input value="{{ old('reservation_date') }}" name="reservation_date" type="date"
                                class="form-control" id="reservation_date" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Reservation Time</label>
                            <input value="{{ old('reservation_time') }}" name="reservation_time" type="time"
                                class="form-control" id="reservation_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="product-category" class="form-label">Assign Table <span
                                    class="text-danger">*</span></label>
                            <select name="table" class="form-control select2" id="product-table">
                                <option value="">Select</option>
                                @foreach ($tables as $table)
                                    <option value="{{ $table->getTableName() }}">{{ $table->getTableName() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> <!-- end col-->

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3 mt-5">
                            <a href="{{ route('customer.index') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                            <input type="submit" class="btn w-sm btn-success waves-effect waves-light"
                                value="Submit" />
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
    </div>
</body>

</html>
