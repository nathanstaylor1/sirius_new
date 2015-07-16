<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) . " - " . config('site.title') : config('site.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet/less" type="text/css" href='<?php echo site_url() ?>assets/css/style.less'/>

	<link rel="shortcut icon" href="<?php echo site_url() ?>assets/media/favicon/favicon.ico" type="image/x-icon"/>


    <script type='text/javascript' src='<?php echo site_url() ?>assets/js/less.min.js'></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='<?php echo site_url() ?>assets/js/script.js'></script>
</head>
<body>

  	<?php if (!isset($parallax)) include 'navbar.php';?>

		<?php echo content()?>

	<?php if (!isset($parallax)) include 'footer.php';?>

	<?php include 'modal.php';?>

</body>
</html>

