<div class="row col-lg-12">
    <a href="<?php echo base_url("item/add/" . $ID); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar
        Nota</a>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Cadastro de Fornecedores</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
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
                                    <th scope="col">Ações</th>
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
                                    <td class=" text-center">
                                        <a href="<?php echo base_url("capa/edit/$capa->CAPAID"); ?>"
                                            class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Editar</a>
                                        <a href="<?php echo base_url("capa/delete/$capa->CAPAID"); ?>"
                                            class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Excluir</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Chave Lic</th>
                        <th>Número de Série [Equipamento]</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataItems as $dataItem) { ?>
                    <tr>
                        <td><?php echo $dataItem->KEYLICENSE?> </td>
                        <td><?php echo $dataItem->SERIELICENSE?> </td>
                        <td class=" text-center">
                            <a href="<?php echo base_url("item/edit/$dataItem->ITEMID"); ?>"
                                class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Editar</a>
                            <a href="<?php echo base_url("item/delete/$dataItem->ITEMID"); ?>"
                                class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Excluir</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>