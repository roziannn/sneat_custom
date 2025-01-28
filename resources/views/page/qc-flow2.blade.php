@extends('layouts.master')
@section('content')
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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div class="btn-group dropend">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-plus-circle me-2"></i>Terima Sample
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:void(0);" id="sampleRuah">Sample Jenis
                                            Ruah
                                        </a></li>
                                    <li><a class="dropdown-item" href="javascript:void(0);" id="sampleKemas">Sample Jenis
                                            Kemas</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-success"><i class="bx bx-download me-2"></i>Export</button>
                        </div>
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

    <div class="modal fade" id="acceptSampleModal" data-bs-backdrop="static" tabindex="-1"
        aria-labelledby="acceptSampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptSampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="html5-text-input" class="col-md-4 col-form-label">Batch Number</label>
                    <div class="input-group mb-3">
                        <input type="text" id="bnRuah" class="form-control shadow-none"
                            placeholder="Enter batch number">
                        <button class="btn btn-outline-primary" type="button" id="searchButtonRuah">
                            <i class="bx bx-search"></i>
                        </button>
                    </div>
                    <small id="bnRuahError" class="text-danger d-none">BN tidak boleh
                        kosong</small>

                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="html5-text-input" class="col-md-6 col-form-label">Line</label>
                            <div class="input-group">
                                <input type="text" id="lineKemas" class="form-control shadow-none" readonly>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="html5-text-input" class="col-md-10 col-form-label">Rutin/Non-Rutin</label>
                            <div class="input-group">
                                <input type="text" id="typeRutin" class="form-control shadow-none" readonly>
                            </div>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="html5-text-input" class="col-md-6 col-form-label">Jenis Ruah</label>
                            <div class="input-group">
                                <input type="text" id="jenisRuah" class="form-control shadow-none" readonly>
                            </div>
                        </div>

                        <div class="mb-3 col-8">
                            <label for="html5-text-input" class="col-md-12 col-form-label">Type Pengujian</label>
                            <div class="input-group">
                                <select name="" id="" class="form-control">
                                    <option value="" readonly>Pilih Pengujian</option>
                                    <option value="">VALIDASI</option>
                                    <option value="">MIKRO+LB</option>
                                    <option value="">MIKRO</option>
                                    <option value="">VALIDASI+MIKRO+LB</option>
                                    <option value="">ED DEG
                                    <option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 col-4">
                            <label for="html5-text-input" class="col-md-12 col-form-label">Tanggal
                                Kedatangan</label>
                            <div class="input-group">
                                <input type="date" id="tglKedatanganKemas" class="form-control shadow-none">
                            </div>
                        </div>

                        <div class=" col-12">
                            <label for="html5-text-input" class="col-md-6 col-form-label text-danger">*Optional</label>

                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input me-3" type="checkbox" value="">
                                    SAMPLE PRIORITAS
                                </label>
                                <label class="list-group-item">
                                    <input class="form-check-input me-3" type="checkbox" value="">
                                    PACKAGING RISK
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-12 text-end">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
        const lineRuahInput = document.getElementById('lineKemas');
        const jenisRuahInput = document.getElementById('jenisRuah');
        const typeRutinInput = document.getElementById('typeRutin');
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
                lineRuahInput.value = "LINE 01/KAPLET";
            }

            if (typeRutinInput) {
                typeRutinInput.value = "RUTIN";
            }


            if (jenisRuahInput) {
                jenisRuahInput.value = "CETAK+FILCO";
            }

            if (tglKedatanganRuahInput) {
                tglKedatanganRuahInput.removeAttribute('readonly');
            }

            bnRuahInput.addEventListener('input', function() {
                if (!bnRuahInput.value.trim() && lineRuahInput) {
                    lineRuahInput.value = '';
                    typeRutinInput.value = '';
                    jenisRuahInput.value = '';

                    tglKedatanganRuahInput.value = '';
                    tglKedatanganRuahInput.setAttribute('readonly',
                        'true');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('sampleRuah').addEventListener('click', function() {
            const modalTitle = document.getElementById('acceptSampleModalLabel');
            const modalContent = document.getElementById('modalContent');

            modalTitle.textContent = 'Form Terima Sample Ruah';

            const modal = new bootstrap.Modal(document.getElementById('acceptSampleModal'));
            modal.show();
        });

        document.getElementById('sampleKemas').addEventListener('click', function() {
            const modalTitle = document.getElementById('acceptSampleModalLabel');
            const modalContent = document.getElementById('modalContent');

            modalTitle.textContent = 'Form Terima Sample Kemas';

            const modal = new bootstrap.Modal(document.getElementById('acceptSampleModal'));
            modal.show();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('#MstTable').DataTable({
            autoWidth: true,
            fixedColumns: {
                start: 3,
                // end: 1
            },
            paging: false,
            scrollCollapse: true,
            scrollX: true,
            scrollY: 300,
            data: [
                [
                    "1",
                    "TAZCB40286",
                    `<a href="#" class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                    `,
                    "Rutin",
                    "Mikro+LB",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "Pending",
                ],
                [
                    "2",
                    "TAZCB40230",
                    `<a href="#" class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                    `,
                    "Rutin",
                    "Mikro+LB",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "16:15, 16-02-2024",
                    "Pending",
                ],
            ],
            columns: [{
                    title: "No",
                    width: 5
                },
                {
                    title: "No Batch",
                },
                {
                    title: "Aksi",
                },
                {
                    title: "Type Rutin"
                },
                {
                    title: "Type Pengujian"
                },
                {
                    title: "Tgl Kedatangan Ruah",
                    width: "150px"
                },
                {
                    title: "Due Date Ruah",
                    width: "150px"
                },
                {
                    title: "Actual Disposisi",
                    width: "150px"
                },
                {
                    title: "Status Ruah",
                    width: "150px"
                },
                {
                    title: "Tgl Kedatangan Kemas",
                    width: "150px"
                },
                {
                    title: "Due Date LWS",
                    width: "150px"

                },
                {
                    title: "Actual Kirim LWS",
                    width: "150px"

                },
                {
                    title: "Status LWS",
                    width: "80px"

                }
            ],
        });
    });
</script>
