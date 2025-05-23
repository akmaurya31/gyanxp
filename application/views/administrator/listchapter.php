<?php include('header.php'); ?>

<body class="nav-md">
<div id="load"></div>
<div class="container body">
  <div class="main_container">
    <?php include('navbar.php');?>

    <div class="right_col" role="main">
      <div class="container mt-4">
        <h2 class="mb-4">📚 Course Chapters 
          <a href="<?= base_url('Courses/addNewChapter/' . $course_id) ?>" class="btn btn-sm btn-success float-end L12">+ Add Chapter</a>
        </h2>

        <?php if (!empty($chapters)): ?>
          <table class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Chapter Title</th>
                <th>Subject Title</th>
                <th>Description</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; foreach ($chapters as $chapter): ?>
                <tr>
                  <td><?= $count++ ?></td>
                  <td>📘 <?= $chapter->chapter_title ?></td>
                  <td>  <?= $chapter->subject_title ?> <?= $chapter->subject_id ?></td>
               <td><?= substr(strip_tags($chapter->description), 0, 250) ?>...</td>
                  <td>
                    <!-- <a href="<?= base_url('Courses/listTopic/'.$chapter->id) ?>" class="btn btn-sm btn-info">View Topics</a> -->
                    <a href="<?= base_url('Coursesadmin/chapteredit/'.$chapter->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('Coursesadmin/chapterdelete/'.$chapter->id) ?>" onclick="return confirm('Delete this chapter?')" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-info">No chapters found. <a href="<?= base_url('admin/chapters/create') ?>">Create one</a>.</div>
        <?php endif; ?>
      </div>

<?php include('footer.php'); ?>
