<?php
$title = "Admin Page";
ob_start();
?>
<h1>Admin Page</h1>
<nav>
    <ul>
        <li><a href="index.php?action=routeindex">Route</a></li>
        <li><a href="index.php?action=busindex">Bus</a></li>
        <li><a href="index.php?action=scheduleindex">Schedule</a></li>
    </ul>
</nav>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>