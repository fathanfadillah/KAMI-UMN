<?php foreach ($alerts as $alert): ?>
    <div class="alert alert-<?php echo $alert['type'] ?>">
        <?php echo  $alert['content']  ?>
    </div>
<?php endforeach; ?>
