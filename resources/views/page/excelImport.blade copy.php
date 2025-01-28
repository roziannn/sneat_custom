@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a>Master</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Export Xlsx.
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="card-header">
                        <h6>Import Excel File</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <div class="flex-grow-1 me-3">
                                <input type="file" id="excelDrop" class="form-control" />
                            </div>
                            <div>
                                <button type="button" id="clearButton"
                                    class="btn btn-outline-danger d-flex align-items-center">
                                    <i class="bx bx-trash me-1"></i> Clear
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover" id="MstTable">
                                <tbody id="tableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="buy-now mt-4">
            <a class="btn btn-danger btn-buy-now text-white" data-bs-toggle="modal" data-bs-target="#addBNModal">
                Tambah BN
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addBNModal" tabindex="-1" aria-labelledby="addBNModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBNModalLabel">Batch Number</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <label for="kategoriInput" class="form-label">Kode</label>
                                <select id="kategoriInput" class="form-control">
                                    <option value="KVBAN">KVBAN</option>
                                    <option value="TKMKN">TKMKN</option>
                                    <option value="KOPQA">KOPQA</option>
                                    <option value="TZXNA">TZXNA</option>
                                </select>
                            </div>
                            <div class="col-md-8 col-12">
                                <label for="batchNumberInput" class="form-label">Batch Number</label>
                                <input type="text" id="batchNumberInput" class="form-control"
                                    placeholder="Masukkan Batch Number">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="addBNButton" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/xlsx.full.min.js"></script>
    <script>
        const clearButton = document.getElementById('clearButton');
        const excelDrop = document.getElementById('excelDrop');
        const tableBody = document.getElementById('tableBody');
        let excelData = [];

        excelDrop.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, {
                        type: 'array'
                    });
                    const sheetName = workbook.SheetNames[0];
                    const sheet = workbook.Sheets[sheetName];
                    const jsonData = XLSX.utils.sheet_to_json(sheet, {
                        header: 1
                    });

                    // excelHeader = jsonData[0];
                    excelData = jsonData.slice(1);
                    renderTable(excelData);
                };
                reader.readAsArrayBuffer(file);
            }
        });

        function renderTable(data) {
            tableBody.innerHTML = '';

            data.forEach(row => {
                const tr = document.createElement('tr');
                row.forEach(cell => {
                    const td = document.createElement('td');
                    td.textContent = cell || '';
                    tr.appendChild(td);
                });
                tableBody.appendChild(tr);
            });
        }

        clearButton.addEventListener('click', function() {
            excelDrop.value = '';
            tableBody.innerHTML = '';
            excelData = [];
            // excelHeader = [];
        });

        // manual tambah BN
        document.getElementById('addBNButton').addEventListener('click', function() {
            const kategori = document.getElementById('kategoriInput').value.trim();
            const batchNumber = document.getElementById('batchNumberInput').value.trim();

            // validasi kategori BN not empty
            if (kategori && batchNumber) {
                const newRow = [kategori, batchNumber];

                excelData.unshift(newRow);
                renderTable(excelData);

                const modal = bootstrap.Modal.getInstance(document.getElementById('addBNModal'));
                modal.hide();
            } else {
                alert('Kategori dan Batch Number harus diisi!');
            }
        });

        document.getElementById('batchNumberInput').addEventListener('input', function(event) {
            event.target.value = event.target.value.toUpperCase();
        });
    </script>
@endsection
