<?php
$result = $conn->query("SELECT * FROM library");
?>
<table class="table table-bordered table-striped bg-white shadow">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Year</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['ID'] ?></td>
                <td>
                    <?php if (!empty($row['BOOK_COVER'])): ?>
                        <img src="data:image/jpeg;base64,<?= base64_encode($row['BOOK_COVER']) ?>" alt="Cover" style="height: 200px;">
                    <?php else: ?>
                        N/A
                    <?php endif; ?>
                </td>
                <td><?= $row['BOOK_TITLE'] ?></td>
                <td><?= $row['AUTHOR_NAME'] ?></td>
                <td><?= $row['GENRE'] ?></td>
                <td><?= $row['PUBLICATION_YEAR'] ?></td>
                <td><?= $row['QUANTITY'] ?></td>
                <td>
                    <a href="?edit=<?= $row['ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?delete=<?= $row['ID'] ?>" onclick="return confirm('Delete this book?')" class="btn btn-sm btn-danger">Delete</a>
                    <a href="?view=<?= $row['ID'] ?>" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
