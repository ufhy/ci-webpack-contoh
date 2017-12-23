<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $template['title']; ?></title>
    <?= Asset::render_css('global'); ?>
</head>
<body>

<?= $template['body']; ?>

<?= Asset::render_js('global'); ?>

</body>
</html>