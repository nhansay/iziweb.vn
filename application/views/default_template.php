<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="vi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $tag_description ?>">
    <meta name="keywords" content="<?= $tag_keywords ?>">
    <meta name="robots" content="noodp,index,follow">
    <meta name="revisit-after" content="1 days">
    <title>Iziweb | <?= $tag_title ?></title>

    <link href="<?= BASE_URL ?>" rel="shortcut icon" type="image/x-icon" />
    <!-- css -->
    <link href="<?= BASE_URL ?>assets/default/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/default/css/reset.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/default/css/style.css" rel="stylesheet">

    <script type="text/javascript">
        base_url = "<?= BASE_URL ?>";
    </script>
</head>
<body>
<?= $header ?>
<?= $content ?>
<?= $footer ?>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="<?= BASE_URL ?>assets/default/js/jquery-ui.min.js"></script>
<script src="<?= BASE_URL ?>assets/default/js/parallax.min.js"></script>
<script src="<?= BASE_URL ?>assets/default/js/main.js"></script>
</body>
</html>