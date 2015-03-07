<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iziweb Admin | Login</title>

    <!-- Bootstrap -->
    <link href="<?= BASE_URL ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/admin/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header id="header" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a id="menu-button" type="button" class="pull-left">
                <i class="fa fa-reorder fa-lg"></i>
            </a>
            <a id="menu-logo" class="navbar-brand">
                Iziweb Admin
            </a>
        </div>
    </div>
</header>

<div id="login-box" class="container-fluid">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">
                    <i class="fa fa-lock fa-fw"></i> Đăng nhập quản trị website
                </h1>
            </div>
            <div class="panel-body">
                <?php echo form_open('admin/login'); ?>
                <?php echo validation_errors(); ?>
                <div class="form-group">
                    <label for="input-username">Tên đăng nhập:</label>
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="username" placeholder="Tên đăng nhập" id="input-username" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-password">Mật khẩu:</label>
                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" value="" placeholder="Mật khẩu" id="input-password" class="form-control" required>
                    </div>
                    <span class="help-block"><a href="<?= BASE_URL ?>admin/login/reset_password">Quên mật khẩu</a></span>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer id="footer">
    <div class="text-center">
        Bản quyền thuộc về <a href="http://iziweb.vn/">Iziweb</a>
    </div>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= BASE_URL ?>assets/admin/js/bootstrap.min.js"></script>
</body>
</html>