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

            <form action="<?php echo base_url("company/update/$company->COMPANYID"); ?>" method="post"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nome:</label>
                                    <input type="text" name="name" class="form-control"
                                        value="<?php echo $company->NAME; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CNPJ:</label>
                                    <input type="text" name="cnpj" class="form-control"
                                        value="<?php echo $company->CNPJ; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-8">
                                <div class="border border-light p-3 mb-2">
                                    <label for="CurrentLogo">Anexar nova imagem</label><br />
                                    <input type="file" name="file" id="fileImage">
                                    <input type="text" name="pathCurrentImage" id="txtPathCurrentImage" value="<?php echo $company->LOGO; ?>" class="d-none">                                    
                                </div>
                            </div>
                            <?php if($company->LOGO != '') { ?>
                            <div class="col-md-4">
                                <div class="border border-light p-3 mb-4">
                                    <label for="CurrentLogo">Logotipo Atual</label><br />
                                    <img id="CurrentLogo" src="../../<?php echo $company->LOGO; ?>"
                                        style="width: 150px;" /><input type="button" value="x" onclick="$('#txtPathCurrentImage').val('');$('#CurrentLogo').attr('src', '');$(this).hide();" style="padding: 0px 7px; border-radius: 15px;" class="btn btn-outline-danger btn-sm ml-2"/>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("company"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Atualizar e Salvar </button>
                </div>
            </form>
        </div>
    </div>
</div>