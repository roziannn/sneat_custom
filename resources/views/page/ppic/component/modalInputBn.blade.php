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
                        <label for="kodeInput" class="form-label">Kode</label>
                        <select id="kodeInput" class="form-control select2">
                            <option value="" readonly>Pilih Kode Produk</option>
                            <option value="KVBAN">KVBAN</option>
                            <option value="TKMKN">TKMKN</option>
                            <option value="KOPQA">KOPQA</option>
                            <option value="TZXNA">TZXNA</option>
                        </select>
                        <small class="errorKode text-danger d-none">*Kode harus diisi</small>
                    </div>

                    <div class="col-md-8 col-12">
                        <label for="batchNumberInput" class="form-label">Batch Number</label>
                        <input type="text" id="batchNumberInput" class="form-control"
                            placeholder="Masukkan Batch Number">
                        <small class="errorBn text-danger d-none">*Batch Number harus diisi</small>

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
<script>
    // manual BN
    document.getElementById('addBNButton').addEventListener('click', function() {
        const kodeInput = document.getElementById('kodeInput');
        const batchNumberInput = document.getElementById('batchNumberInput');
        const kode = kodeInput.value.trim();
        const batchNumber = batchNumberInput.value.trim();
        const errorBn = document.querySelector('.errorBn');
        const errorKode = document.querySelector('.errorKode');

        const btnSave = document.querySelector('.btnSave');


        let isValid = true;

        // validasi kode
        if (!kode) {
            kodeInput.classList.add('is-invalid');
            errorKode.classList.remove('d-none');
            isValid = false;
        } else {
            kodeInput.classList.remove('is-invalid');
            errorKode.classList.add('d-none');
        }

        // validasi bn
        if (!batchNumber) {
            batchNumberInput.classList.add('is-invalid');
            errorBn.classList.remove('d-none');
            isValid = false;
        } else {
            batchNumberInput.classList.remove('is-invalid');
            errorBn.classList.add('d-none');
        }

        if (isValid) {
            const newRow = [kode, batchNumber];
            excelData.unshift(newRow);

            renderTable(excelData);
            updateTotal(excelData);

            btnSave.classList.remove('d-none');

            window.scrollTo({
                top: 0,
                behavior: 'smooth' // scrolling effect
            });

            const modal = bootstrap.Modal.getInstance(document.getElementById('addBNModal'));
            modal.hide();
        }
    });

    // validasi
    document.getElementById('batchNumberInput').addEventListener('input', function(event) {
        const batchNumberInput = event.target;
        const errorBn = document.querySelector('.errorBn');
        batchNumberInput.value = batchNumberInput.value.toUpperCase();

        if (batchNumberInput.value.trim()) {
            errorBn.classList.add('d-none');
            batchNumberInput.classList.remove('is-invalid');
        }
    });

    document.getElementById('kodeInput').addEventListener('change', function() {
        const kodeInput = document.getElementById('kodeInput');
        const errorKode = document.querySelector('.errorKode');

        if (kodeInput.value.trim()) {
            errorKode.classList.add('d-none');
            kodeInput.classList.remove('is-invalid');
        }
    });
    // validasi end

    document.getElementById('addBNModal').addEventListener('hidden.bs.modal', function() {
        const batchNumberInput = document.getElementById('batchNumberInput');
        const kodeInput = document.getElementById('kodeInput');
        const errorBn = document.querySelector('.errorBn');
        const errorKode = document.querySelector('.errorKode');

        batchNumberInput.value = '';
        kodeInput.value = '';
        batchNumberInput.classList.remove('is-invalid');
        kodeInput.classList.remove('is-invalid');
        errorBn.classList.add('d-none');
        errorKode.classList.add('d-none');
    });
</script>
