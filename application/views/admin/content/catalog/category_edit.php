<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý danh mục</h1>
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
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa danh mục</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/category/edit/'.$category['id'], array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $category['id'] ?>">
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tên:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" placeholder="Tên" class="form-control" value="<?= $category['name'] ?>">
                        <?= form_error('name') ?>
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
                        <input type="hidden" name="img" value="<?= $category['img'] ?>">
                        <img id="img" src="<?= $category['img'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thứ tự:</label>
                    <div class="col-sm-9">
                        <input value="<?= $category['sort_order'] ?>" type="text" name="sort_order" placeholder="sort_order" class="form-control">
                        <?= form_error('sort_order') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                    <div class="col-sm-9">
                        <input value="<?= $category['tag_title'] ?>" type="text" name="tag_title" placeholder="Title tag" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-confirm">Thẻ mô tả:</label>
                    <div class="col-sm-9">
                        <input value="<?= $category['tag_description'] ?>" type="text" name="tag_title" placeholder="Meta description" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ từ khóa:</label>
                    <div class="col-sm-9">
                        <input value="<?= $category['tag_keywords'] ?>" type="text" name="tag_keywords" placeholder="Meta keywords" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>

                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>