@extends('components.admin-components.admin-layout')

@push('assets')
    
@endpush
@section('content')
<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class='bx bx-user'></i> Profile
</a>                     
<x-user-components.profile/>
@endsection