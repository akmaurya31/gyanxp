<?php include('header.php'); ?>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
 
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php include('navbar.php'); ?>

            <div class="right_col" role="main">
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <?php if($this->session->userdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <strong>Success!</strong> <?= $this->session->userdata('success'); ?>
                            </div>
                        <?php } elseif($this->session->userdata('error')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <strong>Error!</strong> <?= $this->session->userdata('error'); ?>
                            </div>
                        <?php } ?>
                        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add New Chapter</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <form method="post" action="<?= base_url('Courses/ChapterCreate/'.$course_id); ?>">
                                    <div class="row form-group">
                                        <div class="col-md-6 d-none">
                                            <label for="course_id">Course ID</label>
                                            <!-- <input type="text" name="course_id" class="form-control" value="<?= set_value('course_id') ?>"> -->
                                            <input type="text" readonly name="course_id" class="form-control" value="<?=$course_id ?>">
                                            <?= form_error('course_id', '<div class="error">', '</div>'); ?>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="chapter_title">Chapter Title</label>
                                            <input type="text" name="chapter_title" class="form-control" value="<?= set_value('chapter_title') ?>">
                                            <?= form_error('chapter_title', '<div class="error">', '</div>'); ?>
                                            </div>

                                    <div class="col-md-6">
                                        <label for="">Subject Title</label>
                                        <select name="subject_id" class="form-control">
                                            <option value="">-- Select Subject --</option>
                                            <?php if (!empty($subjects)) : ?>
                                                <?php foreach ($subjects as $subject) : ?>
                                                    <option value="<?= $subject->id ?>" <?= set_select('subject_id', $subject->id) ?>>
                                                        <?= $subject->title ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <?= form_error('subject_id', '<div class="error">', '</div>'); ?>
                                    </div>


                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" class="form-control ckeditor" rows="4" id="editor"><?= set_value('description') ?></textarea>
                                            <?= form_error('description', '<div class="error">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label for="order">Order</label>
                                            <input type="number" name="order" class="form-control" value="1">
                                            <?= form_error('order', '<div class="error">', '</div>'); ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i> Add Chapter
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('footer.php'); ?>
