<?php
error_reporting(0);

class Userop extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");
    }

    public function login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";
        $this->load->view("index", $viewData);
    }

    public function do_login()
    {
        if (get_active_user()) {
            redirect(base_url());
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("user_email", "E-mail", "required|trim|valid_email");
        $this->form_validation->set_rules("user_password", "Senha", "required|trim");

        $this->form_validation->set_message(
            array(
                "required"    => "<b>{field}</b> campo deve ser preenchido",
                "valid_email" => "Por favor insira um endereço de e-mail válido"
            )
        );

        if ($this->form_validation->run() == FALSE) {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "login";
            $viewData->form_error = true;

            $this->load->view("index", $viewData);
        } else {
            $user = $this->user_model->get(
                array(
                    "USERMAIL"     => $this->input->post("user_email"),
                    "PASSWORD"     => md5($this->input->post("user_password")),
                    "USERISACTIVE" => 1
                )
            );

            if ($user) {
                $this->session->set_userdata("user", $user);
                redirect(base_url("dashboard"));
            } else {

                $viewData = new stdClass();

                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "login";

                $viewData->login_error = "nome de usuário ou senha inválidos";

                $this->load->view("index", $viewData);
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata("user");
        redirect(base_url());
    }
}
