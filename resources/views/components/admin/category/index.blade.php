@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Categories</h4>
                <form method="POST" action="{{ route('category.store') }}">
                <div class="input-group float-start mb-2 mt-3 w-50">
                    @csrf
                    <input type="hidden" value="{{ Illuminate\Support\Str::random(20) }}" name="category_id" />
                    <input type="text" name="category" class="form-control" placeholder="Enter new category">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Add</button>
                </div>
            </form>
                {{-- <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle"></i> Add</button> --}}
                <table id="demo-foo-accordion" class="table table-colored mb-0 toggle-arrow-tiny">
                    <thead>
                            <th> Category name </th>
                            <th data-hide="all"></th>
                            <th> Option </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->getCategoryName() }}</td>
                            <td>
                                <ul>
                                @foreach($categoryMenus[$category->category_id] as $menu)
                                    <li class="list-unstyled">{{ $menu->getName() }}</li>
                                @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}"><i class="mdi mdi-pencil me-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                        <a class="dropdown-item" href="{{ route('category.destroy', $category->id) }}"><i class="mdi mdi-delete me-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection