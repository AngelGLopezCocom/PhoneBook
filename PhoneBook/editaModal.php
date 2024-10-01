<!-- Modal edita registro -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Edit Contact</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actualiza.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" id="id" name="id">

                    <div class="mb-2">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-2">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <textarea name="lastName" id="lastName" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="countryNumber" class="form-label">Country Number:</label>
                        <textarea name="countryNumber" id="countryNumber" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="lada" class="form-label">Lada:</label>
                        <textarea name="lada" id="lada" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="phoneNumber" class="form-label">Phone Number:</label>
                        <textarea name="phoneNumber" id="phoneNumber" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">E-mail:</label>
                        <textarea name="email" id="email" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="mb-2">
                        <label for="profile" class="form-label">Profile:</label>
                        <input type="file" name="profile" id="profile" class="form-control" accept="image/jpeg">
                    </div>

                    <div class="d-flex justify-content-end pt2">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary ms-1"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>