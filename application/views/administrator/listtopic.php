<?php include('header.php'); ?>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <?php include('navbar.php'); ?>

    <div class="right_col" role="main">
      <div class="container mt-4">
        <h2 class="mb-4">
          📑 Topics in Chapter: <strong><?= $chapter->title ?></strong>
          <a href="<?= base_url('admin/topics/create?chapter_id=' . $chapter->id) ?>" class="btn btn-sm btn-success float-end">+ Add Topic</a>
        </h2>

        <?php if (!empty($topics)): ?>
          <table class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>Duration</th>
                <th>URL</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php $count = 1; foreach ($topics as $topic): ?>
                <tr>
                  <td><?= $count++ ?></td>
                  <td>🔹 <?= $topic->title ?></td>
                  <td><?= ucfirst($topic->type) ?></td>
                  <td><?= $topic->duration ?> min</td>
                  <td>
                    <?php if ($topic->url): ?>
                      <a href="<?= $topic->url ?>" target="_blank" class="btn btn-sm btn-info">Open</a>
                    <?php else: ?>
                      <span class="text-muted">No URL</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <a href="<?= base_url('admin/topics/edit/' . $topic->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('admin/topics/delete/' . $topic->id) ?>" onclick="return confirm('Delete this topic?')" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="alert alert-info">No topics found. <a href="<?= base_url('admin/topics/create?chapter_id=' . $chapter->id) ?>">Add a new topic</a>.</div>
        <?php endif; ?>

        <a href="<?= base_url('admin/chapters/listChapter/' . $chapter->chapter_id) ?>" class="btn btn-secondary mt-3">← Back to Chapters</a>
      </div>
    </div>

<?php include('footer.php'); ?>
