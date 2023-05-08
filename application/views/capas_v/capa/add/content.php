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
            <div>
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Nome da Capa</label>
                                <input id="capaname" type="text" name="capaname" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Fornecedor:</label>
                                    <select id="supplier" name="supplier" class="form-control">
                                        <?php foreach ($suppliers as $supplier) { ?>
                                        <option value="<?php echo $supplier->SUPPLIERID; ?>">
                                            <?php echo $supplier->CNPJ; ?> — <?php echo $supplier->NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Empresa:</label>
                                    <select id="company" name="company" class="form-control">
                                        <?php foreach ($companies as $company) { ?>
                                        <option value="<?php echo $company->COMPANYID; ?>">
                                            <?php echo $company->CNPJ; ?> — <?php echo $company->NAME; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label>Nota Fiscal:</label>
                                <input id="nf" type="text" name="nf" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Serie da Nota Fiscal:</label>
                                <input id="serienf" type="text" name="serienf" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Ordem de Compra:</label>
                                <input id="oc" type="text" name="oc" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Data de Emissão:</label>
                                <input id="emissiondt" type="text" name="emissiondt" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("capa"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Salvar </button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold add"><i class="fa fa-save"></i>
                        Salvar ! </button>
                </div>
            </div>
        </div>
    </div>
</div>