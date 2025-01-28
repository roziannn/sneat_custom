@extends('layouts.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>Settings
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('settings.permission') }}" class="text-primary"> Permission [Menu Mapping]</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Edit
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-header pb-0 mb-0">
                                <h5 class="mb-0">Role: {{ $data->role_name }}</h5>
                            </div>
                            <form action="{{ route('settings.permissionUpdate', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive text-nowrap">
                                                    <table class="table table-striped table-hover" id="MstTable">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 2px">No</th>
                                                                <th style="width: 900px">Menu Name</th>
                                                                <th style="width: 3px;">Access</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach ($menu as $item)
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ $item->menu_name }}</td>
                                                                    <td>
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="{{ $item->id }}"
                                                                            id="menu_id_{{ $item->id }}"
                                                                            name="menu_id[]"
                                                                            @if (in_array($item->id, $selectedMenu)) checked @endif>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('settings.permission') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary" id="modalSubmitButton">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {

        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
            })
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    });
</script>
