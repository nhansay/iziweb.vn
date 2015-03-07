<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý giao diện</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/theme" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-plus"></i> Thêm mới giao diện</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/theme/add_new', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tiêu đề:</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" placeholder="Tiêu đề" class="form-control">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Giá:</label>
                    <div class="col-sm-9">
                        <input type="text" name="price" placeholder="Giá" class="form-control">
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thuộc danh mục:</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $item): ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('category_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thumbnail:</label>
                    <div class="col-sm-2">
                        <input data-name="thumbnail" type="button" class="img-btn btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('thumbnail') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <img id="thumbnail" class="thumbnail" src="<?= BASE_URL ?>assets/admin/img/no-img.png">
                        <input type="hidden" name="thumbnail" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Screen shot:</label>
                    <div class="col-sm-2">
                        <input data-name="img" type="button" class="img-btn btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('img') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <img id="img" class="thumbnail" src="<?= BASE_URL ?>assets/admin/img/no-img.png">
                        <input type="hidden" name="img" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Mô tả giao diện:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control ckeditor" name="description"></textarea>
                        <?= form_error('description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Link demo:</label>
                    <div class="col-sm-9">
                        <input type="text" name="link_demo" placeholder="Link demo" class="form-control">
                        <?= form_error('link_demo') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tính năng cơ bản:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control ckeditor" name="basic_feature"></textarea>
                        <?= form_error('description') ?>
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
                    <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_title" placeholder="Title tag" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ mô tả:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_title" placeholder="Meta description" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ từ khóa:</label>
                    <div class="col-sm-9">
                        <input type="text" name="tag_keywords" placeholder="Meta keywords" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>

                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>