<?php
include 'config.php';
$editData = null;

// Handle edit request
if (isset($_GET['edit'])) {
    $ID = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM library WHERE ID = ?");
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    $editData = $result->fetch_assoc();
}

// Handle view request
if (isset($_GET['view'])) {
    $viewId = intval($_GET['view']);
    $stmt = $conn->prepare("SELECT * FROM library WHERE ID = ?");
    $stmt->bind_param("i", $viewId);
    $stmt->execute();
    $viewBook = $stmt->get_result()->fetch_assoc();
    include 'library.php';
    exit();
}

// Handle delete request
if (isset($_GET['delete'])) {
    $deleteId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM library WHERE ID = ?");
    $stmt->bind_param("i", $deleteId);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

// Handle insert or update
if (isset($_POST['save'])) {
    $ID = $_POST['ID'] ?? '';
    $BOOK_TITLE = $_POST['BOOK_TITLE'];
    $AUTHOR_NAME = $_POST['AUTHOR_NAME'];
    $GENRE = $_POST['GENRE'];
    $PUBLICATION_YEAR = $_POST['PUBLICATION_YEAR'];
    $QUANTITY = $_POST['QUANTITY'];

    $bookCover = null;
    if (isset($_FILES['BOOK_COVER']) && $_FILES['BOOK_COVER']['error'] === UPLOAD_ERR_OK) {
        $bookCover = file_get_contents($_FILES['BOOK_COVER']['tmp_name']);
    }

    if ($ID) {
        if ($bookCover) {
            $stmt = $conn->prepare("UPDATE library SET BOOK_TITLE=?, AUTHOR_NAME=?, BOOK_COVER=?, GENRE=?, PUBLICATION_YEAR=?, QUANTITY=? WHERE ID=?");
            $stmt->bind_param("ssssssi", $BOOK_TITLE, $AUTHOR_NAME, $bookCover, $GENRE, $PUBLICATION_YEAR, $QUANTITY, $ID);
        } else {
            $stmt = $conn->prepare("UPDATE library SET BOOK_TITLE=?, AUTHOR_NAME=?, GENRE=?, PUBLICATION_YEAR=?, QUANTITY=? WHERE ID=?");
            $stmt->bind_param("ssssii", $BOOK_TITLE, $AUTHOR_NAME, $GENRE, $PUBLICATION_YEAR, $QUANTITY, $ID);
        }
        $stmt->execute();
    } else {
        $stmt = $conn->prepare("INSERT INTO library (BOOK_TITLE, AUTHOR_NAME, BOOK_COVER, GENRE, PUBLICATION_YEAR, QUANTITY) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $BOOK_TITLE, $AUTHOR_NAME, $bookCover, $GENRE, $PUBLICATION_YEAR, $QUANTITY);
        $stmt->execute();
    }

    header("Location: index.php");
    exit();
}

include 'header.php';
include 'form.php';
include 'book_table.php';
?>
