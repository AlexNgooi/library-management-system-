<form method="POST" enctype="multipart/form-data" class="mb-4 p-3 bg-white rounded shadow">
    <h5><?= $editData ? 'Edit' : 'Add' ?> Book</h5>
    <input type="hidden" name="ID" value="<?= $editData['ID'] ?? '' ?>">

    <div class="row g-2">
        <div class="col-md-3">
            <input type="text" name="BOOK_TITLE" class="form-control" placeholder="Book Title"
                required value="<?= $editData['BOOK_TITLE'] ?? '' ?>">
        </div>
        <div class="col-md-3">
            <input type="text" name="AUTHOR_NAME" class="form-control" placeholder="Author Name"
                required value="<?= $editData['AUTHOR_NAME'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <input type="text" name="GENRE" class="form-control" placeholder="Genre"
                required value="<?= $editData['GENRE'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <input type="number" name="PUBLICATION_YEAR" class="form-control" placeholder="Year" min="1000" max="9999"
                required value="<?= $editData['PUBLICATION_YEAR'] ?? '' ?>">
        </div>
        <div class="col-md-2">
            <input type="number" name="QUANTITY" class="form-control" placeholder="Quantity"
                required value="<?= $editData['QUANTITY'] ?? '' ?>">
        </div>
        <div class="col-md-6 mt-2">
            <input type="file" name="BOOK_COVER" class="form-control" <?= $editData ? '' : 'required' ?>>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" name="save" class="btn btn-success"><?= $editData ? 'Update' : 'Save' ?></button>
        <?php if ($editData): ?>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        <?php endif; ?>
    </div>
</form>
