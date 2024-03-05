<?php
$img = new Image();
$img->width = '200px';
$img->height = '200px';
$img->src = 'logo.png';

$link = new Link();
$link->text = "My Link";
$link->target = '_blank';
$link->href = 'home/index';
?>
<div>LOGO</div>
<div>
    <?php echo $data['imgFromController']; ?>
</div>
<div>
    <?php echo $img; ?>
</div>

<div>Link</div>
<div>
    <?php echo $link; ?>
</div>