<nav id="left-column">
    <div class="logo text-center">
        <img src="<?= BASE_URL ?>assets/admin/img/logo.png">
    </div>
    <ul id="left-menu" class=" list-unstyled">
        <li>
            <a href="<?= BASE_URL ?>admin"><i class="fa fa-dashboard fa-lg fa-fw"></i> <span>Tổng quan</span></a>
        </li>
        <li class="has-dropdown">
            <a href="javascript:void(0)"><i class="fa fa-tags fa-lg fa-fw"></i> <span>Quản lý giao diện</span></a>
            <ul class="list-unstyled dropdown">
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/category"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý danh mục</span></a></li>
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/theme"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý giao diện</span></a></li>
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/project"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý dự án</span></a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart fa-lg fa-fw"></i> <span>Quản lý đơn hàng</span></a>
            <ul class="list-unstyled dropdown">
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/order"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý đơn đặt hàng</span></a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <a href="javascript:void(0)"><i class="fa fa-pencil-square fa-lg fa-fw"></i> <span>Quản lý bài viết</span></a>
            <ul class="list-unstyled dropdown">
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/topic"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý chủ đề</span></a></li>
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/post"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý bài viết</span></a></li>
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/page"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý trang</span></a></li>
            </ul>
        </li>
        <li class="has-dropdown">
            <a href="javascript:void(0)"><i class="fa fa-gear fa-lg fa-fw"></i> <span>Quản lý website</span></a>
            <ul class="list-unstyled dropdown">
                <li><a class="sub-menu" href="<?= BASE_URL ?>admin/contact"><i class="fa fa-angle-double-right fa-fw"></i> <span>Quản lý liên hệ</span></a></li>
            </ul>
        </li>
        <li>
            <a href="<?= BASE_URL ?>admin/user"><i class="fa fa-user fa-lg fa-fw"></i> <span>Quản lý tài khoản</span></a>
        </li>
    </ul>
</nav>