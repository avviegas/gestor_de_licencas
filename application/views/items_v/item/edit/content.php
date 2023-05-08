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
            <form action="<?php echo base_url("item/update/"); ?>" method="post">
                <div class="row">
                    <input type="text" name="hiddenid" value="<?php echo $this->uri->segment('3'); ?>" hidden>
                    <input type="text" name="hiddenCapaid" value="<?php echo $item->CAPAID; ?>" hidden>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chave Lic:</label>
                                    <input type="text" name="keylic" value="<?php echo $item->KEYLICENSE; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número de Série:</label>
                                    <input type="text" name="serienumber" value="<?php echo $item->SERIELICENSE; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("item"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Salvar </button>
                </div>
            </form>
        </div>
    </div>
</div>