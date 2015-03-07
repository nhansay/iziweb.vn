<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iziweb Admin</title>

    <!-- Bootstrap -->
    <link href="<?= BASE_URL ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/date-picker.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        base_url = "<?= BASE_URL ?>";
    </script>
</head>
<body>
<?= $header ?>
<?= $left ?>
<?= $content ?>
<?= $footer ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?= BASE_URL ?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>assets/admin/plugin/ckeditor/ckeditor.js"></script>
<script src="<?= BASE_URL ?>assets/admin/js/main.js"></script>
<script src="<?= BASE_URL ?>assets/admin/js/date-picker.js"></script>
<script src="<?= BASE_URL ?>assets/admin/js/bootstrap-tagsinput.min.js"></script>

</body>
</html>