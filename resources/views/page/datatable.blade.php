@extends('layouts.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>Master
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Data Example
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-header">
                                <a class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#openModal">
                                    <i class="bx bx-plus me-2"></i> Create
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-striped table-hover" id="MstTable">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="openModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="openModalTitle">Modal Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBackdrop" class="form-label">Name</label>
                            <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Name" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Data</label>
                            <select class="select2 form-select" id="selectData" aria-label="Default select example">
                                <option selected="">Select an option</option>
                                <option value="1">RG-CHOLINE 500 MG KAPLET/30'S </option>
                                <option value="2">NOROS KAPLET/5X10 </option>
                                <option value="3">STARMUNO KAPLET /3X10 </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="html5-datetime-local-input" class="form-label">Datetime</label>
                            <input class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                                id="html5-datetime-local-input">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="emailBackdrop" class="form-label">Email</label>
                            <input type="text" id="emailBackdrop" class="form-control" placeholder="xxxx@xxx.xx" />
                        </div>
                        <div class="col mb-0">
                            <label for="dobBackdrop" class="form-label">DOB</label>
                            <input type="text" id="dobBackdrop" class="form-control" placeholder="DD / MM / YY" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable({
            data: [
                [
                    "1",
                    "TCTLB40622",
                    "Product A",
                    "Active",
                    "16-02-2024",
                    `<a href="#" class="btn btn-sm btn-primary">Edit</a>
                     <a href="#" class="btn btn-sm btn-danger">Delete</a>`
                ],
                [
                    "2",
                    "TCTLB40610",
                    "Product B",
                    "Active",
                    "16-02-2024",
                    `<a href="#" class="btn btn-sm btn-primary">Edit</a>
                     <a href="#" class="btn btn-sm btn-danger">Delete</a>`
                ],
                [
                    "3",
                    "TCTLB40954",
                    "Product C",
                    "Active",
                    "16-02-2024",
                    `<a href="#" class="btn btn-sm btn-primary">Edit</a>
                     <a href="#" class="btn btn-sm btn-danger">Delete</a>`
                ]
            ],
            columns: [{
                    title: "No"
                },
                {
                    title: "Kode Produk"
                },
                {
                    title: "Data Name"
                },
                {
                    title: "Status"
                },
                {
                    title: "Created Date"
                },
                {
                    title: "Actions",
                    orderable: false
                }
            ]
        });
    });
</script>
