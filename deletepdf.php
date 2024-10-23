<?php
include('connectlogin.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // First, retrieve the file path from the database
    $query = "SELECT document FROM docs WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['document'];

        // Delete the file from the server
        if (file_exists($file_path)) {
            unlink($file_path); // This deletes the file from the server
        }

        // Delete the database record
        $delete_query = "DELETE FROM docs WHERE id = '$id'";
        if (mysqli_query($conn, $delete_query)) {
            echo "PDF deleted successfully.";
            header("Location: 2_sitedocuments.php"); // Redirect back to the main page
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "File not found in database.";
    }
} else {
    echo "No document ID provided.";
}
?>
