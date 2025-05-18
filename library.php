<?php include 'header.php'; ?>

<?php if (!$viewBook): ?>
  <div class="alert alert-danger">Book not found.</div>
<?php else: ?>
  <div class="card shadow p-4">
    <h4 class="mb-3">Book Details</h4>
    <ul class="list-group">
      <li class="list-group-item"><strong>ID:</strong> <?= $viewBook['ID'] ?></li>
      <li class="list-group-item"><strong>Title:</strong> <?= $viewBook['BOOK_TITLE'] ?></li>
      <li class="list-group-item"><strong>Author:</strong> <?= $viewBook['AUTHOR_NAME'] ?></li>
      <li class="list-group-item"><strong>Genre:</strong> <?= $viewBook['GENRE'] ?></li>
      <li class="list-group-item"><strong>Publication Year:</strong> <?= $viewBook['PUBLICATION_YEAR'] ?></li>
      <li class="list-group-item"><strong>Quantity:</strong> <?= $viewBook['QUANTITY'] ?></li>
      <li class="list-group-item">
        <strong>Cover:</strong><br>
        <?php if (!empty($viewBook['BOOK_COVER'])): ?>
          <img src="data:image/jpeg;base64,<?= base64_encode($viewBook['BOOK_COVER']) ?>" class="img-fluid mt-2" alt="Book Cover" style="max-height: 200px;">
        <?php else: ?>
          <span>No cover image available.</span>
        <?php endif; ?>
      </li>
    </ul>
    <a href="index.php" class="btn btn-primary mt-3">Back to List</a>
  </div>
<?php endif; ?>
