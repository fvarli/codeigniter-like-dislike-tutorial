<!doctype html>
<html lang="en">
<head>
    <?php $this->load->view("includes/include_head"); ?>
    <title>Posts</title>
</head>
<body>
<?php // print_r($user); die(); ?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="#"><?= $user->full_name . ' (' . $user->user_name . ')'; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=base_url("logout")?>">Logout <span class="sr-only">(current)</span></a></li>

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="row post_list">
        <?php echo $this->load->view("renders/post_list_render", $posts, true);?>
    </div>
</div>

<script src="<?= base_url("assets/js/jquery-3.5.1.min.js") ?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/js/custom.js") ?>"></script>

</body>
</html>