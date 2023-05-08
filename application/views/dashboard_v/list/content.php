<div class="row">
  <div class="col-md-12">
    <div class="row">
      <?php foreach ($capas as $capa) { ?>
      <div class="col-sm-4 col-md-3 py-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><img src="<?php echo $capa->companyLOGO ?>" class="img-fluid img-thumbnail"
                style="height: 75px;"></h5>
            <p class="card-text"><strong><?php echo $capa->companyNAME; ?></strong> — <?php echo $capa->companyCNPJ; ?></p>
            <a href="<?php echo base_url("item/listid/$capa->CAPAID"); ?>" class="btn btn-primary">Ir Capa [ <?php echo $capa->NAME; ?> ]</a>
          </div>
        </div>
      </div>
      <?php } ?>
      <div class="col-sm-4 col-md-3 py-2">
        <div class="card bg-light border-secondary">
          <div class="card-body">
            <h5 class="card-title"><img src="/assets/icons_system/list.png" class="img-fluid img-thumbnail"
                style="height: 75px;"></h5>
            <p class="card-text"><strong>TODAS AS CAPAS</strong></p>
            <a href="<?php echo base_url("capa"); ?>" class="btn btn-primary">Ir Capa</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>