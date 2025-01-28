@extends('layouts.master')
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>QC
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        Data Sample
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 border p-4">
                                <h5>SAMPLE RUAH</h5>
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <label for="html5-text-input" class="col-md-4 col-form-label">Batch Number</label>
                                    <div class="input-group">
                                        <input type="text" id="bnRuah" class="form-control shadow-none"
                                            placeholder="Enter batch number">
                                        <button class="btn btn-outline-primary" type="button" id="searchButtonRuah">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                    <small id="bnRuahError" class="text-danger d-none">BN tidak boleh
                                        kosong</small>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="html5-text-input" class="col-md-2 col-form-label">Line</label>
                                        <div class="input-group">
                                            <input type="text" id="lineRuah" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="html5-text-input" class="col-md-10 col-form-label">Tanggal
                                            Kedatangan</label>
                                        <div class="input-group">
                                            <input type="date" id="tglKedatanganRuah" class="form-control shadow-none"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12 text-end">
                                        <button class="btn btn-sm btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 border p-4">
                                <h5>SAMPLE KEMAS</h5>
                                <div class="mb-3">
                                </div>
                                <div class="mb-3">
                                    <label for="html5-text-input" class="col-md-4 col-form-label">Batch Number</label>
                                    <div class="input-group">
                                        <input type="text" id="bnKemas" class="form-control"
                                            placeholder="Enter batch number">
                                        <button class="btn btn-outline-primary" type="button" id="searchButtonKemas">
                                            <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                    <small id="bnKemasError" class="text-danger d-none">BN tidak boleh
                                        kosong</small>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-4">
                                        <label for="html5-text-input" class="col-md-6 col-form-label">Line</label>
                                        <div class="input-group">
                                            <input type="text" id="lineKemas" class="form-control shadow-none" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="html5-text-input" class="col-md-6 col-form-label">Type Rutin</label>
                                        <div class="input-group">
                                            <input type="text" id="typeRutinKemas" class="form-control shadow-none"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <label for="html5-text-input" class="col-md-6 col-form-label">Jenis Ruah</label>
                                        <div class="input-group">
                                            <input type="text" id="jenisRuahKemas" class="form-control shadow-none"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12">

                                        <div class="list-group">
                                            <label class="list-group-item">
                                                <input class="form-check-input me-3" type="checkbox" value="">
                                                SAMPLE PRIORITAS
                                            </label>
                                            <label class="list-group-item">
                                                <input class="form-check-input me-3" type="checkbox" value="">
                                                PACKAGING RISK
                                            </label>
                                            <label class="list-group-item">
                                                {{-- <input class="form-check-input me-3" type="checkbox" value="">
                                                Tart tiramisu cake --}}
                                                <label for="">Jenis Ruah</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Cetak</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    {{-- <div class="mb-3 col-4">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">PRIORITAS</label>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">PACKAGING RISK</label>
                                    </div> --}}
                                    <div class="mb-3 col-4">
                                        <label for="html5-text-input" class="col-md-12 col-form-label">Tanggal
                                            Kedatangan</label>
                                        <div class="input-group">
                                            <input type="date" id="tglKedatanganKemas"
                                                class="form-control shadow-none" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-12 text-end">
                                        <button class="btn btn-sm btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        Launch modal
                                    </button> --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">BN:
                                                        <strong>TCTRC40184</strong>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col mb-0">
                                                            <span class="badge bg-label-success">Sample Rutin</span>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <span class="badge bg-label-primary">Line 02</span>
                                                        </div>
                                                        <div class="col mb-0">
                                                            <span class="badge bg-label-secondary">TCTRC</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
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
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable({
            data: [
                [
                    "1",
                    "TAZCB40286",
                    "Rutin",
                    "Mikro + LB",
                    "16:15, 16-02-2024",
                    "16-02-2024",
                    "16-02-2024",
                    "16-02-2024",
                    "16-02-2024",
                    "16-02-2024",
                    "Pending",
                ],
            ],
            columns: [{
                    title: "No"
                },
                {
                    title: "No Batch"
                },
                {
                    title: "Type Rutin"
                },
                {
                    title: "Type Pengujian"
                },
                {
                    title: "Due Date Ruah"
                },
                {
                    title: "Actual Disposisi",
                    // orderable: false
                },
                {
                    title: "Status Ruah",
                    // orderable: false
                },
                {
                    title: "Tgl Kedatangan Kemas",
                    // orderable: false
                },
                {
                    title: "Due Date LWS",
                    // orderable: false
                },
                {
                    title: "Actual Kirim LWS",
                    // orderable: false
                },
                {
                    title: "Status LWS",
                    // orderable: false
                }
            ]
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputFieldRuah = document.getElementById('bnRuah');
        const inputFieldKemas = document.getElementById('bnKemas');

        if (inputFieldRuah) {
            inputFieldRuah.addEventListener('input', function() {
                this.value = this.value.toUpperCase();
            });
        }

        if (inputFieldKemas) {
            inputFieldKemas.addEventListener('input', function() {
                this.value = this.value.toUpperCase();
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';

        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchButtonRuah = document.getElementById('searchButtonRuah');
        const lineRuahInput = document.getElementById('lineRuah');
        const bnRuahInput = document.getElementById('bnRuah');
        const tglKedatanganRuahInput = document.getElementById('tglKedatanganRuah');

        const bnRuahError = document.getElementById('bnRuahError');

        searchButtonRuah.addEventListener('click', function() {
            bnRuahError.classList.add('d-none');
            bnRuahInput.classList.remove('is-invalid');

            if (!bnRuahInput.value.trim()) {
                bnRuahError.classList.remove('d-none');
                bnRuahInput.classList.add('is-invalid');
                return;
            }

            if (lineRuahInput) {
                lineRuahInput.value = "Line 01";
            }

            if (tglKedatanganRuahInput) {
                tglKedatanganRuahInput.removeAttribute('readonly');
            }

            bnRuahInput.addEventListener('input', function() {
                if (!bnRuahInput.value.trim() && lineRuahInput) {
                    lineRuahInput.value = '';
                }
                if (!bnRuahInput.value.trim() && lineRuahInput) {
                    tglKedatanganRuahInput.value = '';
                    tglKedatanganRuahInput.setAttribute('readonly',
                        'true');
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const searchButtonKemas = document.getElementById('searchButtonKemas');
        const lineKemasInput = document.getElementById('lineKemas');
        const typeRutinKemasInput = document.getElementById('typeRutinKemas');
        const jenisRuahKemasInput = document.getElementById('jenisRuahKemas');
        const bnKemasInput = document.getElementById('bnKemas');
        const tglKedatanganKemasInput = document.getElementById('tglKedatanganKemas');

        const bnKemasError = document.getElementById('bnKemasError');


        searchButtonKemas.addEventListener('click', function() {
            bnKemasError.classList.add('d-none');
            bnKemasInput.classList.remove('is-invalid');

            if (!bnKemasInput.value.trim()) {
                bnKemasError.classList.remove('d-none');
                bnKemasInput.classList.add('is-invalid');
                return;
            }

            if (lineKemasInput) {
                lineKemasInput.value = "LINE 01/KAPLET";
            }

            if (jenisRuahKemasInput) {
                jenisRuahKemasInput.value = "CETAK + FILCO";
            }

            if (typeRutinKemasInput) {
                typeRutinKemasInput.value = "RUTIN";
            }


            if (tglKedatanganKemasInput) {
                tglKedatanganKemasInput.removeAttribute('readonly');
            }

            bnKemasInput.addEventListener('input', function() {
                if (!bnKemasInput.value.trim() && lineKemasInput) {
                    lineKemasInput.value = '';
                }
                if (!bnKemasInput.value.trim() && lineKemasInput) {
                    tglKedatanganKemasInput.value = '';
                    tglKedatanganKemasInput.setAttribute('readonly',
                        'true');
                }
            });
        });
    });
</script>
