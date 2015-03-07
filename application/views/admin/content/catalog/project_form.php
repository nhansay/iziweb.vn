<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý dự án</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/category" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới dự án</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/project/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tiêu đề:</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" placeholder="Tiêu đề" class="form-control">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tiêu đề nhỏ:</label>
                    <div class="col-sm-9">
                        <input type="text" name="sub_title" placeholder="Tiêu đề nhỏ" class="form-control">
                        <?= form_error('sub_title') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Link:</label>
                    <div class="col-sm-9">
                        <input type="text" name="link" placeholder="Link" class="form-control">
                        <?= form_error('link') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Mô tả ngắn:</label>
                    <div class="col-sm-9">
                        <textarea rows="5" name="content" class="form-control"></textarea>
                        <?= form_error('content') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Hình ảnh:</label>
                    <div class="col-sm-2">
                        <input data-name="img" type="button" class="img-btn btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('img') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <input type="hidden" name="img">
                        <img id="img" class="thumbnail" src="<?= BASE_URL ?>assets/admin/img/no-img.png">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thứ tự:</label>
                    <div class="col-sm-9">
                        <input type="text" name="sort_order" placeholder="Thứ tự" class="form-control">
                        <?= form_error('sort_order') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Hiển thị trang chủ:</label>
                    <div class="col-sm-9">
                        <select name="show_in_home_page" class="form-control">
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                        <?= form_error('show_in_home_page') ?>
                    </div>
                </div>

                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>