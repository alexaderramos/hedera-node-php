<?php
include('../src/helpers/SessionFlashHelper.php');
$flashError = SessionFlashHelper::get('error');
if (isset($flashError)) {
    echo '<div class="alert alert-danger">' . $flashError . '</div>';
}
