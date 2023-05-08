<script src="<?php echo base_url("assets"); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>

$(".remove").click(function() {
            var id = $(this).parents("tr").attr("id");
            if (confirm('Tem certeza que deseja remover este fornecedor?')) {
                $.ajax({
                    url: 'supplier/delete/' + id,
                    type: 'DELETE',
                    error: function() {
                        alert('Houve um erro. Tente novamente.');
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        alert("Fornecedor removido com sucesso");
                    }
                });
            }
        });

</script>
