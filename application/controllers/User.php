<?php

class User extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "users_v";

        $this->load->model("user_model");
        $this->load->model("ustatus_model");

        $this->load->library("form_validation");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "user/list";

        $viewData->auth = get_active_user();

        $viewData->users = $this->user_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "user/add";

        $viewData->auth = get_active_user();

        $viewData->status = $this->ustatus_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "user/edit";

        $viewData->auth = get_active_user();

        $viewData->user = $this->user_model->get(array('USERID' => $id));
        $viewData->status = $this->ustatus_model->get_all();

        if (!$viewData->user) {
            redirect(base_url("user"));
        } else {
            $this->load->view("index", $viewData);
        }
    }

    public function save()
    {
        $FULLNAME     = strip_tags($this->input->post("fullname"));
        $CPF          = strip_tags($this->input->post("cpf"));
        $USERNAME     = strip_tags($this->input->post("username"));
        $PASSWORD     = strip_tags($this->input->post("password"));
        $USERMAIL     = strip_tags($this->input->post("usermail"));
        $USERPHONE    = strip_tags($this->input->post("userphone"));
        $USERSTATUS   = strip_tags($this->input->post("userstatus"));

        $this->load->library("form_validation");

        $this->form_validation->set_rules("fullname", "", "required");
        $this->form_validation->set_rules("cpf", "", "required");
        $this->form_validation->set_rules("username", "", "required");
        $this->form_validation->set_rules("password", "", "required");
        $this->form_validation->set_rules("usermail", "", "required");

        if ($this->form_validation->run()) {

            $OLDPASSWORD = $PASSWORD;
            $PASSWORD = md5($PASSWORD);

            $save = $this->user_model->add(
                array(
                    "FULLNAME"              => $FULLNAME,
                    "CPF"                   => $CPF,
                    "USERNAME"              => $USERNAME,
                    "PASSWORD"              => $PASSWORD,
                    "OLDPASSWORD"           => $OLDPASSWORD,
                    "USERMAIL"              => $USERMAIL,
                    "USERPHONE"             => $USERPHONE,
                    "USERSTATUS"            => $USERSTATUS
                )
            );

            if ($save) {
                redirect(base_url("user"));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("user/add"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("user/add"));
        }
    }

    public function update($id)
    {
        $viewData = new stdClass();

        $FULLNAME     = strip_tags($this->input->post("fullname"));
        $CPF          = strip_tags($this->input->post("cpf"));
        $USERNAME     = strip_tags($this->input->post("username"));
        $PASSWORD     = strip_tags($this->input->post("password"));
        $USERMAIL     = strip_tags($this->input->post("usermail"));
        $USERPHONE    = strip_tags($this->input->post("userphone"));
        $USERSTATUS   = strip_tags($this->input->post("userstatus"));

        $this->load->library("form_validation");

        $this->form_validation->set_rules("fullname", "", "required");
        $this->form_validation->set_rules("cpf", "", "required");
        $this->form_validation->set_rules("username", "", "required");
        $this->form_validation->set_rules("password", "", "required");
        $this->form_validation->set_rules("usermail", "", "required");

        if ($this->form_validation->run()) {

            if ($PASSWORD != "" && strlen($PASSWORD) > 25) {
                $viewData->user = $this->user_model->get(array('USERID' => $id));
                $PASSWORD = $viewData->user->PASSWORD;
                $OLDPASSWORD = $viewData->user->OLDPASSWORD;
            } else {
                $OLDPASSWORD = $PASSWORD;
                $PASSWORD = md5($PASSWORD);
            }

            $update = $this->user_model->update(
                array("USERID" => $id),
                array(
                    "FULLNAME"              => $FULLNAME,
                    "CPF"                   => $CPF,
                    "USERNAME"              => $USERNAME,
                    "PASSWORD"              => $PASSWORD,
                    "OLDPASSWORD"           => $OLDPASSWORD,
                    "USERMAIL"              => $USERMAIL,
                    "USERPHONE"             => $USERPHONE,
                    "USERSTATUS"            => $USERSTATUS
                )
            );

            if ($update) {
                redirect(base_url("user/edit/$id"));
            } else {
                redirect(base_url("user"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("user/edit/$id"));
        }
    }

    public function delete($id)
    {
        $delete = $this->user_model->delete(array("USERID" => $id));

        if (!$delete) {
            redirect(base_url("user"));
        } else {
            redirect(base_url("user/edit/$id"));
        }
    }
}