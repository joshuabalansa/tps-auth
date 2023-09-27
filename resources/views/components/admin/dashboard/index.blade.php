@extends('layouts.app')

@section('content')
   
    {{-- <!-- start page title -->
    <x-admin.dashboard.page-title />
    <!-- end page title -->  --}}

    <x-admin.dashboard.dashboard-card />

    {{-- <x-admin.dashboard.dashboard-analytics /> --}}
    
    <div class="row">
        {{-- <x-admin.dashboard.card-map /> --}}
        <x-admin.dashboard.card-table :menus="$menus" />
    </div>
          
@endsection