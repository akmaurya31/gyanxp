<?php include('header.php');?>
<style>
    .img-thumbnail{
        width: 100%;
    }
    .img-section{
        position: relative;
    }
    .upload-btn{
        position: absolute;
        bottom: 0px;
        left: 15px;
        right: 15px;
        background: #2a3f54b5;
        padding: 15px;
        color: #fff;
        text-align: center;
    }
    .custom-upload{
        position: absolute;
        left: 0;
        right: 0px;
        top: 0;
        bottom: 0;
        opacity: 0.001;
    }
    .card-box form{
        padding: 0px 15px;
        overflow: hidden;
    }

    .error{
        color: red;
        padding: 7px 0px;
        font-size: 11px;
    }

</style>
<body class="nav-md">
    <div id="load"></div>
    <div class="container body">
        <div class="main_container">
            <!-- Side and top navbar -->
            <?php include('navbar.php');?>

            <!-- page content -->
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>Manage Questions</h2>
            <a href="<?php echo base_url('Quizadmin/addQues'); ?>" class="btn btn-success pull-right">
                <i class="fa fa-plus-circle"></i> Add New Question
            </a>
            <div class="clearfix"></div>
        </div>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question (EN)</th>
                    <th>Option A</th>
                    <th>Option B</th>
                    <th>Correct</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($questions): $i = 1; foreach($questions as $q): ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $q->question_en; ?><br/><br/>Hi: <?php echo $q->question_hi; ?></td>
                        <td><?php echo $q->option_a_en; ?><br/><br/>Hi: <?php echo $q->option_a_hi; ?></td>
                        <td><?php echo $q->option_b_en; ?><br/><br/>Hi: <?php echo $q->option_b_hi; ?></td>
                        <td><?php echo $q->option_c_en; ?><br/><br/>Hi: <?php echo $q->option_c_hi; ?></td>
                        <td><?php echo $q->option_d_en; ?><br/><br/>Hi: <?php echo $q->option_d_hi; ?></td>
                        <td><strong><?php echo strtoupper($q->correct_option); ?></strong></td>
                        <td>
                            <a href="<?php echo base_url('Quizadmin/editQues/'.$q->id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('Questionadmin/delete/'.$q->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this question?')"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr><td colspan="6">No questions found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include('footer.php'); ?>
