<!-- Modal -->
<div class="modal fade" id="openModal" tabindex="-1" aria-labelledby="openModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openModalLabel">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="role_name" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" required>
                    </div>
                    <div class="alert alert-warning p-2 m-0">
                        <span>Use camelCase for naming. For example: <strong>abcDef</strong></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="closeModalButton">Close</button>
                    <button type="submit" class="btn btn-primary" id="modalSubmitButton">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('openModal');
        const modalTitle = document.querySelector('#openModalLabel');
        const roleNameField = document.querySelector('#role_name');
        const roleForm = document.querySelector('#roleForm');
        const modalSubmitButton = document.querySelector('#modalSubmitButton');

        function setModalContent(mode, roleId = '', roleName = '') {
            modalTitle.textContent = mode === 'create' ? 'Create' : 'Edit';
            roleForm.action = mode === 'create' ? '{{ route('settings.roleStore') }}' :
                `/settings/roles/${roleId}`;
            roleNameField.value = roleName;
            modalSubmitButton.textContent = mode === 'create' ? 'Create' : 'Update';
            modalSubmitButton.classList.toggle('btn-primary', mode === 'create');
            modalSubmitButton.classList.toggle('btn-warning', mode === 'edit');

            // set metode form
            document.querySelector('#methodField').value = mode === 'create' ? 'POST' : 'PUT';
        }

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                setModalContent('edit', this.dataset.roleId, this.dataset.roleName);
            });
        });

        document.querySelector('.btn-create').addEventListener('click', function() {
            setModalContent('create');
        });

        modal.addEventListener('hidden.bs.modal', function() {
            setModalContent('create');
        });
    });
</script>
