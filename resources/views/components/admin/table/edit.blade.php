@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Add Table</h5>
                    <form action="{{ route('table.update', $table->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Table Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $table->getTableName() }}" name="table_name" id="table_name"
                                class="form-control" placeholder="Enter table name" required>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Status <span class="text-danger">*</span></label>
                            <br />
                            <div class="radio form-check-inline">
                                <input type="radio" id="inlineRadio1" value="available" name="status" checked="">
                                <label for="inlineRadio1"> Available </label>
                            </div>
                            <div class="radio form-check-inline">
                                <input type="radio" id="inlineRadio3" value="occupied" name="status">
                                <label for="inlineRadio3"> Occupied </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center mb-3">
                                    <a href="{{ route('table.index') }}"
                                        class="btn w-sm btn-secondary waves-effect waves-light">Cancel</a>
                                    <input type="submit" class="btn w-sm btn-success waves-effect waves-light"
                                        value="Update" />
                                </div>
                            </div> <!-- end col -->
                        </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tables</label>
                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100"
                                id="tickets-table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>Table Name</th>
                                        <th>Status</th>
                                        <th class="hidden-sm">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($tables as $table)
                                        <tr>
                                            <td>
                                                {{ $table->id }}
                                            </td>
                                            <td>
                                                {{ $table->getTableName() }}
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-{{ $table->status == 'available' ? 'success' : 'danger' }}">{{ $table->getStatus() }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);"
                                                        class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm"
                                                        data-bs-toggle="dropdown" aria-expanded="false"><i
                                                            class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i
                                                                class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('table.destroy', $table->id) }}"><i
                                                                class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <!-- Preview -->

                    </div>
                </div> <!-- end col-->



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
            </div </div>
        @endsection
