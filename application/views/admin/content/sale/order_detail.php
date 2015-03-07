<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Chi tiết đơn đặt hàng</h1>
            </div>
            <div class="pull-right">
                <?php if ($order['status'] == 1): ?>
                    <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/order/check_out/<?= $order['id'].'/'.$this->security->get_csrf_hash() ?>" class="btn btn-success" title="Tick đã xem">
                        <i class="fa fa-check"></i>
                    </a>
                <?php endif; ?>
                <button data-toggle="tooltip" data-placement="top" class="btn btn-danger" title="Xóa" onclick="if(confirm('Bạn có chắc chắn xóa?')) {$('#action').val('delete');$('form').submit();}">
                    <i class="fa fa-trash-o"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Mã đơn hàng</td>
                    <td><?= $order['id'] ?></td>
                </tr>
                <tr>
                    <td>Thời gian</td>
                    <td><?= $order['order_time'] ?></td>
                </tr>
                <tr>
                    <td>Tên KH</td>
                    <td><?= $order['full_name'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $order['email'] ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td><?= $order['address'] ?></td>
                </tr>
                <tr>
                    <td>SĐT</td>
                    <td><?= $order['phone'] ?></td>
                </tr>
                <tr>
                    <td>Thông tin</td>
                    <td><?= $order['order_info'] ?></td>
                </tr>
                <tr>
                    <td>Mã giao diện</td>
                    <td><?= $order['theme_id'] ?></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><?= $order['status']==1?'<strong class="text-danger">Mới</strong>':'Đã xem' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>