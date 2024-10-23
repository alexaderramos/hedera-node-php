<?php
session_start();
if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}
$title = 'New token'; include '../includes/header.php';
?>
<h1>New token</h1>
<?php include '../includes/flash.php';?>
<form action="/api/token.php?action=create" method="POST" class="mt-4">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="symbol">Symbol:</label>
        <input type="text" name="symbol" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="initialSupply">Initial Supply:</label>
        <input type="number" name="initialSupply" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php include '../includes/footer.php'; ?>
