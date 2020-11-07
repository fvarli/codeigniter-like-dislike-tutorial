<!doctype html>
<html lang="en">
<head>
    <?php $this->load->view("includes/include_head"); ?>
    <title>Login</title>
</head>
<body>


<div class="container">
    <h3 class="text-center">Login</h3>


    <div class="col-md-8 col-md-offset-2 well">
        <form action="<?= base_url("user/login") ?>" method="post">
        <div class="row">
            <?php if ($this->session->userdata("error")) { ?>
                <div class="row">

                    <div class="alert alert-danger col-md-10 col-md-offset-1">
                        <?php echo $this->session->userdata("error"); ?>
                    </div>

                </div>
            <?php } ?>

                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>


</body>
</html>