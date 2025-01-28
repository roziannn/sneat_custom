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
                    <li class="breadcrumb-item active">
                        Permission [Menu Mapping]
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-header">
                                <a class="btn btn-primary text-white" href="{{ route('settings.permissionCreate') }}">
                                    <i class="bx bx-plus me-2"></i> Create
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped table-hover" id="MstTable">
                                        <thead>
                                            <tr>
                                                <th style="width:2px">No</th>
                                                <th>Role Name</th>
                                                <th>Menu Access</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($permissions as $roleId => $items)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $items->first()->role->role_name }}</td>
                                                    <td>
                                                        @foreach ($items as $item)
                                                            <small class="badge rounded-pill bg-label-success me-2 mb-2">
                                                                {{ $item->menu->menu_name }}
                                                            </small>
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $items->first()->updated_at->format('d-m-Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('settings.permission.edit', ['id' => $roleId]) }}"
                                                            class="btn btn-sm btn-primary btn-edit">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
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
            </div>
        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable({
            autoWidth: false,
            columnDefs: [{
                targets: 3,
                width: "200px"
            }],

        });

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
