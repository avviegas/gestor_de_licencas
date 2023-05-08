<?php

class Supplier extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "suppliers_v";

        $this->load->model("supplier_model");
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
        $viewData->subViewFolder = "supplier/list";

        $viewData->auth = get_active_user();

        $viewData->suppliers = $this->supplier_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "supplier/add";

        $viewData->auth = get_active_user();

        $viewData->status = $this->ustatus_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "supplier/edit";

        $viewData->auth = get_active_user();

        $viewData->supplier = $this->supplier_model->get(array('SUPPLIERID' => $id));
        $viewData->status = $this->ustatus_model->get_all();

        if (!$viewData->supplier) {
            redirect(base_url("supplier"));
        } else {
            $this->load->view("index", $viewData);
        }
    }

    public function save()
    {
        $CNPJ           = strip_tags($this->input->post("cnpj"));
        $NAME           = strip_tags($this->input->post("name"));

        $this->load->library("form_validation");

        $this->form_validation->set_rules("cnpj", "", "required");
        $this->form_validation->set_rules("name", "", "required");

        if ($this->form_validation->run()) {

            $save = $this->supplier_model->add(
                array(
                    "CNPJ"                  => $CNPJ,
                    "NAME"                  => $NAME
                )
            );

            if ($save) {
                redirect(base_url("supplier"));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("supplier/add"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("supplier/add"));
        }
    }

    public function update($id)
    {
        $viewData = new stdClass();

        $CNPJ         = strip_tags($this->input->post("cnpj"));
        $NAME         = strip_tags($this->input->post("name"));

        $this->load->library("form_validation");

        $this->form_validation->set_rules("cnpj", "", "required");
        $this->form_validation->set_rules("name", "", "required");

        if ($this->form_validation->run()) {

            $update = $this->supplier_model->update(
                array("SUPPLIERID" => $id),
                array(
                    "CNPJ"                  => $CNPJ,
                    "NAME"                  => $NAME,                    
                )
            );

            if ($update) {
                redirect(base_url("supplier/edit/$id"));
            } else {
                redirect(base_url("supplier"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("supplier/edit/$id"));
        }
    }

    public function delete($id)
    {
        $delete = $this->supplier_model->delete(array("SUPPLIERID" => $id));

        if (!$delete) {
            redirect(base_url("supplier"));
        } else {
            redirect(base_url("supplier/edit/$id"));
        }
    }
}