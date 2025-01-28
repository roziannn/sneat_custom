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
                        Batch Number
                    </li>
                </ol>
            </nav>
            <div class="col-lg-12 my-3 order-0">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h6>Import Doc. Excel</h6>
                            <p class="">Total: <span id="totalBn"><strong>0 </strong>item</span> (Batch Number)</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
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
                        <small class="text-secondary text-muted">* Upload hanya 1 dokumen excel</small>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped table-hover mt-4" id="MstTable">
                                <tbody id="tableBody"></tbody>
                            </table>
                        </div>
                        <div class="col-12 mt-4 d-none btnSave">
                            <button class="btn btn-success">Simpan Data</button>
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

        @include('page.ppic.component.modalInputBn')
    </div>

    <script src="../assets/js/xlsx.full.min.js"></script>
    <script>
        const clearButton = document.getElementById('clearButton');
        const excelDrop = document.getElementById('excelDrop');
        const tableBody = document.getElementById('tableBody');
        const totalBn = document.getElementById('totalBn'); // get elemen untuk total baris

        const btnSave = document.querySelector('.btnSave');

        const batchNumberInput = document.getElementById('batchNumberInput');
        const addBNModal = document.getElementById('addBNModal');

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

                    const newExcelData = jsonData.slice(1);
                    excelData = [...excelData, ...newExcelData]; // merge existing data + new/baru excel
                    renderTable(excelData);
                    updateTotal(excelData);
                    showTotal();
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

            btnSave.classList.remove('d-none');
        }

        function updateTotal(data) {
            const total = data.length;
            const totalBnElement = document.getElementById('totalBn');
            totalBnElement.innerHTML = `<strong>${total}</strong> item`;
        }


        function showTotal() {
            totalBn.parentElement.classList.remove('d-none');
        }

        clearButton.addEventListener('click', function() {
            excelDrop.value = '';
            tableBody.innerHTML = '';
            excelData = [];
            updateTotal(excelData);

            btnSave.classList.add('d-none');
        });
    </script>
@endsection
