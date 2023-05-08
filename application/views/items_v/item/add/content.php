<?php $user_error = $this->session->flashdata('user_error'); ?>
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-light" role="alert">
                        <h4 class="alert-heading">Dados da Capa</h4>                        
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nome da Capa</th>
                                <th scope="col">Fornecedor</th>
                                <th scope="col">Empresa</th>
                                <th scope="col">NF</th>
                                <th scope="col">Serie</th>
                                <th scope="col">Ordem de Compra</th>
                                <th scope="col">Data de Emissão</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataCapa as $capa) { ?>
                            <tr>
                                <td><?php echo $capa->NAME; ?></td>
                                <td><?php echo $capa->supplierCNPJ . " — " . $capa->supplierNAME; ?> </td>
                                <td><?php echo $capa->companyCNPJ . " — " . $capa->companyNAME; ?> </td>
                                <td><?php echo $capa->NF; ?></td>
                                <td><?php echo $capa->SERIENF; ?></td>
                                <td><?php echo $capa->OC; ?></td>
                                <td><?php echo $capa->EMISSIONDT; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if (isset($user_error)) { ?>
            <div class="alert alert-danger border-0 alert-dismissible">
                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                <?php echo $user_error; ?>
            </div>
            <?php } ?>
            <form action="<?php echo base_url("item/save/"); ?>" method="post">
                <div class="row">
                    <input type="text" name="hiddenid" value="<?php echo $this->uri->segment('3'); ?>" hidden>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Chave Lic:</label>
                                    <input type="text" name="keylic" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número de Série:</label>
                                    <input type="text" name="serienumber" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <a href="<?php echo base_url("capa"); ?>" class="btn btn-danger btn-sm font-weight-bold"><i
                            class="fa fa-undo"></i> Voltar </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold"><i class="fa fa-save"></i>
                        Salvar </button>
                </div>
            </form>
        </div>
    </div>
</div>