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
                        Product
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
                    <h5 class="modal-title" id="openModalTitle">Create Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Code</label>
                            <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Code" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Product Name</label>
                            <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Product Name" />
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nameBackdrop" class="form-label">Line</label>
                                <select name="" id="" class="form-control">
                                    <option value="" readonly>Select a line</option>
                                    <option value="line01">Line 01</option>
                                    <option value="line02">Line 02</option>
                                    <option value="line03">Line 03</option>
                                    <option value="line04">Line 04</option>
                                    <option value="line05">Line 05</option>
                                    <option value="line07">Line 07</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nameBackdrop" class="form-label">Type Rutin</label>
                                <select name="" id="" class="form-control">
                                    <option value="" readonly>Select a type</option>
                                    <option value="rutin">Rutin</option>
                                    <option value="non-rutin">Non-Rutin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Bentuk Sediaan</label>
                            <select name="" id="" class="form-control">
                                <option value="" readonly>Select a type</option>
                                <option value="injeksi">Injeksi</option>
                                <option value="softCapsule">Soft Capsule</option>
                                <option value="kaplet">Kaplet</option>
                                <option value="tablet">Tablet</option>
                                <option value="lyo">Lyo</option>
                                <option value="liquid">Liquid</option>
                            </select>
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

    <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="openModalTitle">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Code</label>
                            <input type="text" id="nameBackdrop" class="form-control" placeholder="Enter Code" />
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Product Name</label>
                            <input type="text" id="nameBackdrop" class="form-control"
                                placeholder="Enter Product Name" />
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="nameBackdrop" class="form-label">Line</label>
                                <select name="" id="" class="form-control">
                                    <option value="" readonly>Select a line</option>
                                    <option value="line01">Line 01</option>
                                    <option value="line02">Line 02</option>
                                    <option value="line03">Line 03</option>
                                    <option value="line04">Line 04</option>
                                    <option value="line05">Line 05</option>
                                    <option value="line07">Line 07</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="nameBackdrop" class="form-label">Type Rutin</label>
                                <select name="" id="" class="form-control">
                                    <option value="" readonly>Select a type</option>
                                    <option value="rutin">Rutin</option>
                                    <option value="non-rutin">Non-Rutin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Bentuk Sediaan</label>
                            <select name="" id="" class="form-control">
                                <option value="" readonly>Select a type</option>
                                <option value="injeksi">Injeksi</option>
                                <option value="softCapsule">Soft Capsule</option>
                                <option value="kaplet">Kaplet</option>
                                <option value="tablet">Tablet</option>
                                <option value="lyo">Lyo</option>
                                <option value="liquid">Liquid</option>
                            </select>
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
                    "TSBNA",
                    "SALBRON 2 MG TABLET /10X10",
                    "Line 01",
                    "Tablet",
                    "Rutin",
                    `<a class="btn btn-sm btn-primary btnEdit text-white">Edit</a>`
                ],
                [
                    "2",
                    "THXMA",
                    "HEXCAM 15 MG TABLET / 3X10",
                    "Line 02",
                    "Tablet",
                    "Rutin",
                    `<a class="btn btn-sm btn-primary text-white">Edit</a>`
                ],
                [
                    "3",
                    "TPIZA",
                    "PRO-INZ KAPLET / 10X10",
                    "Line 03",
                    "Kaplet",
                    "Rutin",
                    `<a class="btn btn-sm btn-primary text-white">Edit</a>`
                ]
            ],
            columns: [{
                    title: "No"
                },
                {
                    title: "Kode"
                },
                {
                    title: "Nama Produk"
                },
                {
                    title: "Line"
                },
                {
                    title: "Bentuk Sediaan"
                },
                {
                    title: "Type Rutin"
                },
                {
                    title: "Actions",
                    orderable: false
                }
            ]
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editModal = document.getElementById("editModal");
        const editForm = document.getElementById("editForm");

        document.querySelectorAll(".btnEdit").forEach(button => {
            button.addEventListener("click", function() {
                // const id = this.getAttribute("data-id");
                // const name = this.getAttribute("data-name");
                // const category = this.getAttribute("data-category");
                // const price = this.getAttribute("data-price");
                // const quantity = this.getAttribute("data-quantity");

                // editForm.querySelector("#editId").value = id;
                // editForm.querySelector("#editName").value = name;
                // editForm.querySelector("#editCategory").value = category;
                // editForm.querySelector("#editPrice").value = price;
                // editForm.querySelector("#editQuantity").value = quantity;

                $(editModal).modal("show");
            });
        });

        // document.getElementById("saveEdit").addEventListener("click", function() {
        //     const formData = new FormData(editForm);

        //     fetch("/your-endpoint-to-save", {
        //             method: "POST",
        //             body: formData,
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             alert("Data berhasil diperbarui!");
        //             $(editModal).modal("hide");
        //         })
        //         .catch(error => {
        //             console.error("Error:", error);
        //         });
        // });
    });
</script>
