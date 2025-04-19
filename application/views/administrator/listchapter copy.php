<?php include('header.php'); ?>

<body class="nav-md">
    <div id="load"></div>
    <div class="container body">
        <div class="main_container">
            <!-- Side and top navbar -->
            <?php include('navbar.php');?>

            <!-- page content -->


 
<div class="right_col" role="main">

<div class="container mt-4">
  <h2 class="mb-4">📚 Course Chapters & Topics 
    <a href="<?= base_url('admin/chapters/create') ?>" class="btn btn-sm btn-success float-end">+ Add Chapter</a>
  </h2>

  <?php if (!empty($chapters)): ?>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>#</th>
          <th>Chapter Title</th>
          <th>Description</th>
          <th>Topics</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $count = 1; foreach ($chapters as $chapter): ?>
          <tr class="table-primary">
            <td><?= $count++ ?></td>
            <td>📘 <?= $chapter->chapter_title ?></td>
            <td><?= $chapter->description ?></td>
            <td colspan="2">
              <?php if (!empty($chapter->topics)): ?>
                <table class="table mb-0 table-sm">
                  <thead>
                    <tr class="bg-light">
                      <th>Title</th>
                      <th>Type</th>
                      <th>Duration</th>
                      <th>URL</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($chapter->topics as $topic): ?>
                      <tr>
                        <td>🔹 <?= $topic->title ?></td>
                        <td><?= ucfirst($topic->type) ?></td>
                        <td><?= $topic->duration ?> min</td>
                        <td>
                          <?php if ($topic->url): ?>
                            <a href="<?= $topic->url ?>" target="_blank" class="btn btn-sm btn-info">Open</a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a href="<?= base_url('admin/topics/edit/'.$topic->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                          <a href="<?= base_url('admin/topics/delete/'.$topic->id) ?>" onclick="return confirm('Delete this topic?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              <?php else: ?>
                <p class="text-muted">No topics yet. 
                  <a href="<?= base_url('admin/topics/create?chapter_id='.$chapter->id) ?>" class="btn btn-sm btn-outline-success">+ Add Topic</a>
                </p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <td colspan="5" class="text-end">
              <a href="<?= base_url('admin/chapters/edit/'.$chapter->id) ?>" class="btn btn-sm btn-warning">Edit Chapter</a>
              <a href="<?= base_url('admin/chapters/delete/'.$chapter->id) ?>" onclick="return confirm('Delete this chapter?')" class="btn btn-sm btn-danger">Delete Chapter</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Pagination if available -->
    <div class="d-flex justify-content-center">
      <?php // $this->pagination->create_links(); ?>
    </div>

  <?php else: ?>
    <div class="alert alert-info">No chapters found. <a href="<?= base_url('admin/chapters/create') ?>">Create one</a>.</div>
  <?php endif; ?>
</div>

<?php include('footer.php'); ?>
