<!-- Modal -->
<div class="modal fade" id="openModal" tabindex="-1" aria-labelledby="openModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="openModalLabel">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form" method="POST" action="">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Menu Name</label>
                            <input type="text" id="menu_name" name="menu_name" class="form-control"
                                placeholder="Enter Name" />

                        </div>

                        <div class="col-12 mb-3">
                            <label for="nameBackdrop" class="form-label">Icon</label>
                            <input type="text" id="icon" name="icon" class="form-control"
                                placeholder="Enter Icon" />

                        </div>
                        <div class="col-12">
                            <label for="nameBackdrop" class="form-label">URL Route</label>
                            <div class="input-group">
                                <input type="text" id="url_route" name="url_route" class="form-control"
                                    placeholder="Enter Url Route Name" />
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch my-3">
                                    <input class="form-check-input" type="checkbox" id="isSubMenu">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Choose a Parent Menu
                                    </label>
                                </div>

                                <select id="parent_id" name="parent_id" class="form-control mt-2" disabled>
                                    <option value="">Select a menu</option>
                                    @foreach ($asParent as $item)
                                        <option value="{{ $item->id }}">{{ $item->menu_name }}</option>
                                    @endforeach
                                </select>
                                <script>
                                    document.getElementById('isSubMenu').addEventListener('change', function() {
                                        var selectMenu = document.getElementById('parent_id');
                                        if (this.checked) {
                                            selectMenu.disabled = false;
                                        } else {
                                            selectMenu.disabled = true;
                                        }
                                    });
                                </script>
                            </div>
                        </div>
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
        const menuNameField = document.querySelector('#menu_name');
        const menuUrlField = document.querySelector('#menu_url');

        const form = document.querySelector('#form');
        const modalSubmitButton = document.querySelector('#modalSubmitButton');

        function setModalContent(mode, menuId = '', menuName = '', menuUrl = '') {
            modalTitle.textContent = mode === 'create' ? 'Create' : 'Edit';
            form.action = mode === 'create' ? '{{ route('settings.menuStore') }}' :
                `/settings/menu/${menuId}`;
            menuNameField.value = menuName;
            menuUrlField.value = menuUrl;
            modalSubmitButton.textContent = mode === 'create' ? 'Create' : 'Update';
            modalSubmitButton.classList.toggle('btn-primary', mode === 'create');
            modalSubmitButton.classList.toggle('btn-warning', mode === 'edit');

            // set metode form
            document.querySelector('#methodField').value = mode === 'create' ? 'POST' : 'PUT';
        }

        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                setModalContent('edit', this.dataset.menuId, this.dataset.menuName, this.dataset
                    .menuUrl);
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
