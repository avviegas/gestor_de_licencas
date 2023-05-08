<script src="<?php echo base_url("assets"); ?>/vendor/jquery/jquery.mask.js"></script>

<script>
    $(function() {
        $("#emissiondt").mask('99/99/9999', {
            placeholder: "dd/mm/yyyy"
        });
    });
</script>

<script>
    $(".add").click(function() {
        var capaname = $("#capaname").val();
        var supplier = $("#supplier option:selected").val();
        var company = $("#company option:selected").val();
        var nf = $("#nf").val();
        var serienf = $("#serienf").val();
        var oc = $("#oc").val();
        var emissiondt = $("#emissiondt").val();
        if ($.trim(capaname) == '') {
            alert('Informe um nome para a Capa');
            return;
        }
        if (supplier == 0 || supplier == -1 || supplier == null || supplier == '') {
            alert('Informe um Fornecedor');
            return;
        }
        if (company == 0 || company == -1 || company == null) {
            alert('Informe uma Empresa');
            return;
        }
        if ($.trim(nf) == '') {
            alert('Informe uma NF válida');
            return;
        }
        if ($.trim(serienf) == '') {
            alert('Informe uma Série NF válida');
            return;
        }
        if ($.trim(oc) == '') {
            alert('Informe uma Ordem de Compra válida');
            return;
        }
        if ($.trim(emissiondt).toString().length < 10) {
            alert('Informe uma Data de Emissão válida');
            return;
        }

        var dataObj = {
            capaname: capaname,
            supplier: supplier,
            company: company,
            nf: nf,
            serienf: serienf,
            oc: oc,
            emissiondt: emissiondt
        }


        $.ajax({
            url: '/capa/save',
            data: dataObj,
            type: 'POST',
            dataType: 'json',
            error: function() {
                alert('Houve um erro. Tente novamente.');
            },
            success: function(data) {
                alert('deu certo');
                // $("#" + id).remove();
                // alert("Usuário removido com sucesso");
            }
        });
    });
</script>