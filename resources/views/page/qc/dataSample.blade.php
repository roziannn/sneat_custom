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
                            <label for="html5-text-input" class="col-md-6 text-danger pb-1">*optional</label>

                            <div class="list-group">
                                <label class="list-group-item">
                                    <input class="form-check-input me-3" type="checkbox" value="">
                                    Sample Prioritas
                                </label>
                                <label class="list-group-item">
                                    <input class="form-check-input me-3" type="checkbox" value="">
                                    Packaging Risk
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

    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="viewModalLabel" data-bs-backdrop="static"
        tabindex="-1" aria-modal="true" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header border-bottom pb-2">
                    <h5 class="modal-title" id="viewModalLabel">No Batch: <strong>TAZCB40286</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row border-bottom">
                        <div class="col-md-4">
                            <p><strong>Kode Produk:</strong> TAZCB</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Rutin/Non-Rutin:</strong> RUTIN</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Type Ruah:</strong> Cetak</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Type Pengujian:</strong> Mikro+LB</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Nama Produk:</strong> AZITHROMYCIN 500 MG KAPLET/5X6</p>
                        </div>
                        <div class="col-md-4">
                            <p><strong>Line/Sediaan:</strong> LINE01/KAPLET</p>
                        </div>
                    </div>
                </div>
                <div class="modal-body py-2">
                    <div class="d-flex align-items-center">
                        {{-- <h5 class="mb-4">Sample Progress</h5> --}}
                        <h5 class="mb-4">Status Ruah: <span class="badge bg-label-warning p-2 mx-2">Pending</span>
                        </h5>
                    </div>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100">75%</div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-3 mb-4">
                            <p class="m-0 pb-1"><strong><i class='bx bx-clipboard'></i> Kedatangan Ruah</strong></p>
                            <small class="text-secondary"><strong>Completed on 15:10, 10 Jan 2025</strong></small>
                            <button class="btn btn-secondary btn-sm mt-3" disabled>Complete <i
                                    class="bx bx-check-circle"></i></button>
                        </div>
                        <div class="col-md-3 mb-4">
                            <p class="m-0 pb-1"><strong><i class='bx bx-map-pin'></i> Actual Disposisi</strong></p>
                            <small class="text-danger"><strong>Due Date on 17:08, 10 Jan 2025</strong></small>
                            <button class="btn btn-success btn-sm mt-3">Mark as Complete <i
                                    class="bx bx-check-circle"></i></button>
                        </div>
                        <div class="col-md-3 mb-4">
                            <p class="m-0 pb-1"><strong><i class='bx bx-clipboard'></i> Kedatangan Kemas</strong></p>
                            <small class="text-secondary"><strong>Completed On (Not completed)</strong></small>
                            <button class="btn btn-danger btn-sm mt-3" disabled>Not avalibale <i
                                    class="bx bx-x-circle"></i></button>
                        </div>
                        <div class="col-md-3 mb-4">
                            <p class="m-0 pb-1"><strong><i class='bx bx-mail-send'></i> Kirim LWS to QA</strong></p>
                            <small class="text-secondary"><strong>Completed On (Not completed)</strong></small>
                            <button class="btn btn-danger btn-sm mt-3" disabled>Not avalibale <i
                                    class="bx bx-x-circle"></i></button>
                        </div>
                    </div>

                </div>



                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>

</style>

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
                    `<a class="btn btn-sm btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#detailModal"><i class='bx bx-show'></i></a>
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
                [
                    "2",
                    "TAZCB40090",
                    `<a href="#" class="btn btn-sm btn-primary"><i class='bx bx-show'></i></a>
                    `,
                    "Non-Rutin",
                    "Mikro",
                    "16:15, 16-02-2024",
                    "16:15, 18-02-2024",
                    "-",
                    "-",
                    "-",
                    "-",
                    "-",
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
