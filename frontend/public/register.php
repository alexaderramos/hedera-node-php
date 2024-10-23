
<?php session_start(); $title = 'Register'; include '../includes/header.php'; ?>
<h1 class="text-center">Register</h1>
<?php include '../includes/flash.php';?>
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="/api/auth.php?action=register" method="POST" class="mt-4 mb-4">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                <a href="login.php">
                    Already have an account? Login here.
                </a>
            </div>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
