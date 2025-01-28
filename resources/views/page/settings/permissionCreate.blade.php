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
                        Create
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-header pb-0 mb-0">
                                <h5>Create Permission</h5>
                            </div>
                            <form action="{{ route('settings.permissionStore') }}">
                                <div class="card-body">
                                    <div class="table-responsive text-nowrap">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="nameBackdrop" class="form-label">Role Name</label>
                                                <select name="role_id" id="role_id" class="form-control mb-4">
                                                    <option value="">Select a Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                    @endforeach
                                                </select>
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
                                                                            name="menu_id[]">
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
