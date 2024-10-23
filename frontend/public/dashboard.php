<?php
session_start();
if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit();
}

include '../api.php';
/**
 * Get the list of tokens
 */
$tokens = callAPI('GET', '/tokens/list-tokens');

$title = 'Dashboard'; include '../includes/header.php';
?>
<h1>Dashboard</h1>
<h2>My Tokens</h2>
<div class="mt-4">
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
                <th>Token ID</th>
                <th>Name</th>
                <th>Symbol</th>
                <th>Initial Supply</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tokens as $token): ?>
                <tr>
                    <td><?php echo $token->tokenId; ?></td>
                    <td><?php echo $token->name; ?></td>
                    <td><?php echo $token->symbol; ?></td>
                    <td><?php echo $token->initialSupply; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<a href="create-token.php" class="btn btn-primary mt-4">New token</a>
<?php include '../includes/footer.php'; ?>
