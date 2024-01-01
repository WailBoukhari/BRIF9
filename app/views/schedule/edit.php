<?php
$title = "Edit Schedule";
ob_start();
?>
<div class="container mt-5">
    <h1>
        <?php $title ?>
    </h1>

    <?php $content = ob_get_clean(); ?>
    <?php include_once 'app/views/include/layout.php'; ?>