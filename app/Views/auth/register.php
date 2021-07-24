<?= $this->extend('auth/template/index'); ?>

<?= $this->section('login'); ?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Create Account</h3>
                            </div>
                            <?= form_open('auth/saveregis'); ?>
                            <div class="card-body">
                                <!-- pesan validasi error -->
                                <?php $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php  } ?>
                                <!-- pesan validasi berhasil -->
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-success" role="alert">';
                                    echo  session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>

                                <form>
                                    <div class="form-group">
                                        <label class="small mb-1" for="username">Username</label>
                                        <input class="form-control py-4" id="username" type="text" name="name" aria-describedby="usernameHelp" placeholder="Enter Username" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control py-4" id="email" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="Password">Password</label>
                                                <input class="form-control py-4" id="Password" name="password" type="password" placeholder="Enter password" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="confirmPass">Confirm Password</label>
                                                <input class="form-control py-4" id="confirmPass" name="conpas" type="password" placeholder="Confirm password" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="from-grup">
                                        <label for="level" class="form-label small mb-1">Status</label>
                                        <select id="level" class="form-select" name="level">
                                            <option selected disabled value="">--pilih--</option>
                                            <option>Admin</option>
                                            <option>User</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                </form>
                            </div>
                            <?= form_close(); ?>
                            <div class="card-footer text-center">
                                <div class="small"><a href="login">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
<?= $this->endSection(); ?>