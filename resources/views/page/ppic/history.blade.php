@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>History</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Batch Number
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="card-header pb-2">
                        <div class="d-flex justify-content-between">
                            {{-- <h6>History</h6> --}}
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover mt-4" id="MstTable">
                                <tbody id="tableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('page.ppic.component.modalHistoryBn')

    </div>

    <script src="../assets/js/xlsx.full.min.js"></script>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable({
            data: [
                [
                    "1",
                    "10 Jan 2025, 15:10:12",
                    "ppic1@dankosfarma.com",
                    "19 BN",
                    `<a class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#viewModal"><i class='bx bx-show'></i></a>
                    `,
                ],
                [
                    "2",
                    "10 Jan 2025, 16:24:12",
                    "ppic1@dankosfarma.com",
                    "40 BN",
                    `<a href="#" class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                    `,
                ],
                [
                    "3",
                    "10 Jan 2025, 15:10:12",
                    "ppic1@dankosfarma.com",
                    "31 BN",
                    `<a href="#" class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                    `,
                ]
            ],
            columns: [{
                    title: "No",
                    width: 5
                },
                {
                    title: "Created At"
                },
                {
                    title: "Created By"
                },

                {
                    title: "Total"
                },
                {
                    title: "Actions",
                    orderable: false
                }
            ]
        });
    });
</script>
