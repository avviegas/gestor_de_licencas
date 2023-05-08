<div class="row col-lg-12">
    <a href="<?php echo base_url("capa/add"); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar
        Capa</a>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Cadastro de Capa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Capa</th>
                        <th>Fornecedor</th>
                        <th>Empresa</th>
                        <th>NF</th>
                        <th>Serie</th>
                        <th>Ordem de Compra</th>
                        <th>Data de Emissão</th>
                        <th>Total de Chaves</th>
                        <th>Disponível</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($capas as $capa) { ?>
                    <tr>
                        <td><?php echo $capa->NAME?> </td>
                        <td><?php echo $capa->supplierCNPJ . " — " . $capa->supplierNAME; ?> </td>
                        <td><?php echo $capa->companyCNPJ . " — " . $capa->companyNAME; ?> </td>
                        <td><?php echo $capa->NF; ?></td>
                        <td><?php echo $capa->SERIENF; ?></td>
                        <td><?php echo $capa->OC; ?></td>
                        <td><?php echo $capa->EMISSIONDT; ?></td>
                        <td><?php echo $capa->totalChaves; ?></td>
                        <td><?php echo $capa->totalChavesDisp; ?></td>
                        <td class=" text-center">
                            <a href="<?php echo base_url("item/add/$capa->CAPAID"); ?>" class="btn btn-success btn-sm">
                                <i class="fa fa-list-ol"></i> Inserir Nota</a>
                            <a href="<?php echo base_url("item/listid/$capa->CAPAID"); ?>" class="btn btn-dark btn-sm">
                                <i class="fa fa-eye"></i> Ver Notas</a>
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