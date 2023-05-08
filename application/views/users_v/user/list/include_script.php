<script src="<?php echo base_url("assets"); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url("assets"); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
    $(".remove").click(function() {
        var id = $(this).parents("tr").attr("id");
        var superuser = $(this).parents("tr").attr("superuser");
        if (superuser <= 0) {
            if (confirm('Tem certeza que deseja remover este usuário?')) {
                $.ajax({
                    url: 'user/delete/' + id,
                    type: 'DELETE',
                    error: function() {
                        alert('Houve um erro. Tente novamente.');
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        alert("Usuário removido com sucesso");
                    }
                });
            }
        } else {
            alert('Este login é um SUPER USUÁRIO e não pode ser removido');
            return;
        }
    });
</script>