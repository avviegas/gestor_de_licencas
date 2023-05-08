<?php $user_error = $this->session->flashdata('user_error'); ?>
<div class="content">
    <div class="card">
        <div class="card-body">
            <?php if (isset($user_error)) { ?>
            <div class="alert alert-danger border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <?php echo $user_error; ?>
            </div>
            <?php } ?>

            <form action="<?php echo base_url("user/update/$user->USERID"); ?>" method="post"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" name="fullname" class="form-control"
                                        value="<?php echo $user->FULLNAME; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CPF:</label>
                                    <input type="text" name="cpf" class="form-control"
                                        value="<?php echo $user->CPF; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    <input type="text" name="usermail" class="form-control"
                                        value="<?php echo $user->USERMAIL; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Telefone:</label>
                                    <input type="text" name="userphone" class="form-control"
                                        value="<?php echo $user->USERPHONE; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Usuário:</label>
                                    <input type="text" name="username" class="form-control"
                                        value="<?php echo $user->USERNAME; ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Senha:</label>
                                    <input type="text" name="password" class="form-control"
                                        value="<?php echo $user->OLDPASSWORD; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de Permissão:</label>
                                    <select name="userstatus" class="form-control form-control-select2" data-fouc>
                                        <?php foreach ($status as $statu) { ?>
                                        <option value="<?php echo $statu->USERSTATUSID; ?>"
                                            <?php echo $statu->USERSTATUSID == $user->USERSTATUS ? 'selected' : ''; ?>>
                                            <?php echo $statu->USERSTATUSNAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("user"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Atualizar e Salvar </button>
                </div>
            </form>
        </div>
    </div>
</div>