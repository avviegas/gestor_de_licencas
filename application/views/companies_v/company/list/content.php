<div class="row col-lg-12">
	<a href="<?php echo base_url("company/add"); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Empresa</a>
</div>
<br>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Cadastro de Empresas</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>CNPJ</th>
						<th>Nome</th>						
						<th>Logotipo</th>
						<th>Data de Cadastro</th>						
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($companies as $company) { ?>
						<tr id="<?php echo $company->COMPANYID; ?>">
							<td><?php echo $company->CNPJ; ?> </td>
							<td><?php echo $company->NAME; ?> </td>													
							<td><img src="<?php echo $company->LOGO ?>" style="width: 150px;"/></td>
							<td><?php echo $company->DTINC; ?></td>							
							<td class=" text-center">
								<a href="<?php echo base_url("company/edit/$company->COMPANYID"); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Editar</a>
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