<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-left">
                <h1>Quản lý bài viết</h1>
            </div>
            <div class="pull-right">
                <button data-toggle="tooltip" data-placement="top" type="button" class="btn btn-primary" title="Lưu lại" onclick="$('#submit-form').trigger('click')">
                    <i class="fa fa-save"></i>
                </button>
                <a data-toggle="tooltip" data-placement="top" href="<?= BASE_URL ?>admin/post" class="btn btn-danger" title="Hủy">
                    <i class="fa fa-remove"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title"><i class="fa fa-pencil"></i> Sửa bài viết</h2>
            </div>
            <div class="panel-body">
                <?= form_open('admin/post/edit', array('id'=>'main-form', 'class'=>'form-horizontal')); ?>
                <input type="hidden" name="id" value="<?= $post['id'] ?>">
                <div class="form-group required">
                    <label class="col-sm-2 control-label">Tiêu đề:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['title'] ?>" type="text" name="title" placeholder="Tiêu đề" class="form-control">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày đăng:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['post_date'] ?>" type="text" name="post_date" placeholder="Mặc định là hôm nay" class="form-control date-picker">
                        <?= form_error('post_date') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tác giả:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['author'] ?>" type="text" name="author" placeholder="Tác giả" class="form-control">
                        <?= form_error('author') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh đại diện:</label>
                    <div class="col-sm-2">
                        <input data-name="thumbnail" type="button" class="img-btn btn btn-sm btn-primary" value="Chọn ảnh">
                        <?= form_error('thumbnail') ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-7">
                        <img id="thumbnail" class="thumbnail" src="<?= $post['thumbnail'] ?>">
                        <input type="hidden" name="thumbnail" value="<?= $post['thumbnail'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tóm tắt:</label>
                    <div class="col-sm-9">
                        <textarea rows="7" class="form-control" name="excerpt" placeholder="Để trống nếu muốn mặc định"><?= $post['excerpt'] ?></textarea>
                        <?= form_error('excerpt') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nội dung:</label>
                    <div class="col-sm-9">
                        <textarea class="form-control ckeditor" name="content"><?= $post['content'] ?></textarea>
                        <?= form_error('content') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tag bài viết:</label>
                    <div class="col-sm-9">
                        <input name="tags" class="form-control" type="text" value="<?= $post['tags'] ?>" data-role="tagsinput" />
                        <?= form_error('tags') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thuộc chủ đề:</label>
                    <div class="col-sm-9">
                        <select name="topic_id" class="form-control">
                            <?php topic_option($topics, $post['topic_id']) ?>
                        </select>
                        <?= form_error('topic_id') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ tiêu đề:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['tag_title'] ?>" type="text" name="tag_title" placeholder="Title tag" class="form-control">
                        <?= form_error('tag_title') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ mô tả:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['tag_description'] ?>" type="text" name="tag_title" placeholder="Meta description" class="form-control">
                        <?= form_error('tag_description') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thẻ từ khóa:</label>
                    <div class="col-sm-9">
                        <input value="<?= $post['tag_keywords'] ?>" type="text" name="tag_keywords" placeholder="Meta keywords" class="form-control">
                        <?= form_error('tag_keywords') ?>
                    </div>
                </div>

                <input id="submit-form" type="submit" style="display: none">
                </form>
            </div>
        </div>
    </div>
</div>