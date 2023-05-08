<div class="row col-lg-12">
    <a href="<?php echo base_url("supplier/add"); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar
        Fornecedor</a>
</div>
<br>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Cadastro de Fornecedores</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>CNPJ</th>
                        <th>Nome</th>
                        <th>Data de Cadastro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier) { ?>
                    <tr id="<?php echo $supplier->SUPPLIERID?>">
                        <td><?php echo $supplier->CNPJ; ?> </td>
                        <td><?php echo $supplier->NAME; ?> </td>
                        <td><?php echo $supplier->DTINC; ?></td>
                        <td class=" text-center">
                            <a href="<?php echo base_url("supplier/edit/$supplier->SUPPLIERID"); ?>"
                                class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Editar</a>
                            <button type="submit" class="btn btn-danger btn-sm remove"> <i class="fa fa-trash"></i>
                                Excluir</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>