<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($title) ? _h($title) . " - " . config('site.title') : config('site.title') ?></title>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no" />

	<link rel="stylesheet" href="<?php echo site_url() ?>assets/media/fonts/font-awesome/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,200,600,700,900|Lato:400,300,100,700,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href='<?php echo site_url() ?>assets/css/style.css'/>
	<link rel="shortcut icon" href="<?php echo site_url() ?>assets/media/favicon/favicon.ico" type="image/x-icon"/>

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='<?php echo site_url() ?>assets/js/script.js'></script>
</head>
<body>

  	<?php if (!isset($parallax)) include 'navbar.php';?>

		<?php echo content()?>

	<?php if (!isset($parallax)) include 'footer.php';?>

	<?php include 'modal.php';?>

</body>
</html>

