@extends('layouts.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>Settings</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Role
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-header">
                                {{-- <div class="card-header d-flex justify-start align-items-center"> --}}
                                <a href="#" class="btn btn-primary text-white btn-create me-2" data-bs-toggle="modal"
                                    data-bs-target="#openModal">
                                    <i class="bx bx-plus me-2"></i> Create
                                </a>
                                {{-- <div class="col">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="tooltip"
                                        data-bs-offset="0,4" data-bs-placement="right" data-bs-html="true"
                                        data-bs-original-title="<i class='bx bx-trending-up bx-xs' ></i> <span>Tooltip on right</span>">
                                        Right
                                    </button>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped table-hover" id="MstTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Role Name</th>
                                                <th>Updated At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($role as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $item->role_name }}</td>
                                                    <td>{{ $item->updated_at->format('d M Y H:i') }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary btn-edit"
                                                            data-bs-toggle="modal" data-bs-target="#openModal"
                                                            data-role-id="{{ $item->id }}"
                                                            data-role-name="{{ $item->role_name }}">
                                                            <i class="bx bx-pencil"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-danger btn-delete"
                                                            data-role-id="{{ $item->id }}"><i
                                                                class="bx bx-trash"></i></a>
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
    @include('page.settings.roleIndexModal')
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable();

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

<script>
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-delete')) {
            e.preventDefault();

            const button = e.target.closest('.btn-delete');
            const roleId = button.dataset.roleId;

            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/settings/roles/${roleId}`;
                    form.innerHTML = `
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    });
</script>
