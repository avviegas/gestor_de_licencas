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
            <form action="<?php echo base_url("company/save/"); ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ:</label>
                                    <input type="text" name="cnpj" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="border border-light p-3 mb-2">
                                <div class="custom-file">
                                    <label for="customFile">Anexar imagem</label><br/>
                                    <input type="file" name="file" id="customFile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("company"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Salvar </button>
                </div>
            </form>
        </div>
    </div>
</div>