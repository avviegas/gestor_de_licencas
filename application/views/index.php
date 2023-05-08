<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php $this->load->view("includes/head"); ?>
</head>

<body>
    <?php if ($subViewFolder != "login" &&  $subViewFolder != "forget_password") { ?>
    <div id="wrapper">
        <?php $this->load->view("includes/aside"); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("includes/navbar"); ?>
                <div class="container-fluid">
                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://agenciapublics.com/">Publics Tecnologia</a> 2022</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php } else { ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>
    <?php }  ?>

    <?php $this->load->view("includes/include_script"); ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/include_script"); ?>
</body>

</html>