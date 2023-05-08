<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Gestão de Licenças</h1>
                                </div>
                                <?php if (isset($login_error)) { ?>
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <?php echo $login_error; ?>
                                </div>
                                <?php } ?>

                                <?php if (isset($form_error)) { ?>
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <?php echo form_error("user_email"); ?>
                                </div>
                                <?php } ?>
                                <?php if (isset($form_error)) { ?>
                                <div class="alert alert-danger border-0 alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                    <?php echo form_error("user_password"); ?>
                                </div>
                                <?php } ?>
                                <form class="user" class="login-form" action="<?php echo base_url("sigin"); ?>"
                                    method="post">
                                    <div class="form-group">
                                        <input name="user_email" type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Digite o e-mail">
                                    </div>
                                    <div class="form-group">
                                        <input name="user_password" type="password"
                                            class="form-control form-control-user" id="exampleInputPassword"
                                            placeholder="Senha">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Acessar</button>
                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="http://denizartunaydin.com/" target="_blank">Deniz Artun
                                        Aydın</a>
                                </div>
                                <div class="text-center">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <a href="https://github.com/denizartunaydin" class="btn btn-default"><i
                                                class="fa fa-github"></i></a>
                                        <a href="https://www.linkedin.com/in/denizartunaydin/"
                                            class="btn btn-default"><i class="fa fa-linkedin"></i></a>
                                        <a href="https://www.facebook.com/denizartunaydin" class="btn btn-default"><i
                                                class="fa fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/denizartunaydin/" class="btn btn-default"><i
                                                class="fa fa-instagram"></i></a>
                                        <a href="https://twitter.com/denizartunaydin" class="btn btn-default"><i
                                                class="fa fa-twitter"></i></a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>