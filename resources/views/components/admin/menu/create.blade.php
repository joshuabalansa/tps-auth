
    @extends('layouts.app')

    @section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                    <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Menu Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('name') }}" name="name" id="product-name" class="form-control" placeholder="e.g : Burger, Fries">
                        </div>

                        <div class="mb-3">
                            <label for="product-description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea> <!-- end Snow-editor-->
                        </div>
                        <div class="mb-3">
                            <label for="product-category" class="form-label">Categories <span class="text-danger">*</span></label>
                            <select name="category" class="form-control select2" id="product-category">
                                <option value="" selected>Select</option>
                                @foreach($categories as $category)
                                <option value="{{$category->category_id}}">{{ $category->getCategoryName() }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product-price">Price <span class="text-danger">*</span></label>
                            <input value="{{ old('price') }}" name="price" type="text" class="form-control" id="product-price" placeholder="Enter amount">
                        </div>
                     
                        

                        {{-- <div>
                            <label class="form-label">Comment</label>
                            <textarea class="form-control" rows="3" placeholder="Please enter comment"></textarea>
                        </div> --}}
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->

                <div class="col-lg-6">
                    
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Menu Image</h5>

                            <div class="mb-3">
                                <label for="product-price">Image <span class="text-danger">*</span></label>
                                <input value="{{ old('image') }}" name="image" type="file" class="form-control"  />
                            </div>
                            <div class="mb-3">
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
                            </div>
                            <!-- Preview -->
                           
                        </div>
                    </div> <!-- end col-->

                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <a href="{{ route('menu.index') }}" class="btn w-sm btn-light waves-effect">Cancel</a>
                            <input type="submit" class="btn w-sm btn-success waves-effect waves-light" value="Save" />
                            {{-- <button type="button" class="btn w-sm btn-danger waves-effect waves-light">Delete</button> --}}
                        </div>
                    </div> <!-- end col -->
                </div>

                </div> <!-- end col-->
    </div>
 

               
            </form>
    <!-- end row -->

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
