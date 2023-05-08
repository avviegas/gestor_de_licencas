<?php

class Company extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "companies_v";

        $this->load->model("company_model");
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
        $viewData->subViewFolder = "company/list";

        $viewData->auth = get_active_user();

        $viewData->companies = $this->company_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "company/add";

        $viewData->auth = get_active_user();

        $viewData->status = $this->ustatus_model->get_all();

        $this->load->view("index", $viewData);
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "company/edit";

        $viewData->auth = get_active_user();

        $viewData->company = $this->company_model->get(array('COMPANYID' => $id));
        $viewData->status = $this->ustatus_model->get_all();

        if (!$viewData->company) {
            redirect(base_url("company"));
        } else {
            $this->load->view("index", $viewData);
        }
    }

    public function save()
    {
        $CNPJ           = strip_tags($this->input->post("cnpj"));
        $NAME           = strip_tags($this->input->post("name"));        
        $FILEFULLPATH   = "";

        $allow = array("jpg", "jpeg", "gif", "png");
        
        if (!!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
        {
            $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
        
            if ( in_array( end($info), $allow) ) // is this file allowed
            {
                if ( move_uploaded_file( $_FILES['file']['tmp_name'], _PASTAUPLOAD . basename($_FILES['file']['name'] ) ) )
                {
                    $FILEFULLPATH = _PASTAUPLOAD . basename($_FILES['file']['name']);
                }
            }
            else
            {
                // error this file ext is not allowed
            }
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("cnpj", "", "required");
        $this->form_validation->set_rules("name", "", "required");

        if ($this->form_validation->run()) {

            $save = $this->company_model->add(
                array(
                    "CNPJ"                  => $CNPJ,
                    "NAME"                  => $NAME,
                    "LOGO"                  => $FILEFULLPATH
                )
            );

            if ($save) {
                redirect(base_url("company"));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("company/add"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("company/add"));
        }
    }

    public function update($id)
    {
        $viewData = new stdClass();

        $CNPJ               = strip_tags($this->input->post("cnpj"));
        $NAME               = strip_tags($this->input->post("name"));
        $PATHCURRENTIMAGE   = strip_tags($this->input->post("pathCurrentImage"));

        $FILEFULLPATH   = "";
        $FILEADDED = 0;

        $allow = array("jpg", "jpeg", "gif", "png");
        
        if (!!$_FILES['file']['tmp_name'] ) // is the file uploaded yet?
        {
            $info = explode('.', strtolower( $_FILES['file']['name']) ); // whats the extension of the file
        
            if ( in_array( end($info), $allow) ) // is this file allowed
            {
                if ( move_uploaded_file( $_FILES['file']['tmp_name'], _PASTAUPLOAD . basename($_FILES['file']['name'] ) ) )
                {
                    $FILEFULLPATH = _PASTAUPLOAD . basename($_FILES['file']['name']);
                    $FILEADDED = 1;
                }
            }
            else
            {
                // error this file ext is not allowed
            }
        }

        $this->load->library("form_validation");

        $this->form_validation->set_rules("cnpj", "", "required");
        $this->form_validation->set_rules("name", "", "required");

        if ($this->form_validation->run()) {

            $update = $this->company_model->update(
                array("COMPANYID" => $id),
                array(
                    "CNPJ"                  => $CNPJ,
                    "NAME"                  => $NAME,  
                    "LOGO"                  => ($FILEADDED == 1) ? $FILEFULLPATH : $PATHCURRENTIMAGE
                )
            );

            if ($update) {
                redirect(base_url("company/edit/$id"));
            } else {
                redirect(base_url("company"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("company/edit/$id"));
        }
    }

    public function delete($id)
    {
        $delete = $this->company_model->delete(array("COMPANYID" => $id));

        if (!$delete) {
            redirect(base_url("company"));
        } else {
            redirect(base_url("company/edit/$id"));
        }
    }
}