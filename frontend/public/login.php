<?php $title = 'Login'; include '../includes/header.php'; ?>
<h1 class="text-center">Iniciar Sesión</h1>

<?php
session_start();
include '../includes/flash.php';

if (isset($_GET['error']) && $_GET['error'] === 'token_expired') {
    echo '<div class="alert alert-danger" role="alert">Your session has expired. Please log in again.</div>';
}
?>

<div class="row d-flex justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form  action="api/auth.php?action=login" method="POST" class="mt-4 mb-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <a href="register.php" class="mt-5">
                    You don't have an account yet? Register here.
                </a>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
