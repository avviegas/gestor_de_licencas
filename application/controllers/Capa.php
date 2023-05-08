<?php

class Capa extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "capas_v";

        $this->load->model("capa_model");

        $this->load->model("supplier_model");
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
        $viewData->subViewFolder = "capa/list";

        $viewData->auth = get_active_user();

        $viewData->capas = $this->capa_model->get_all();
        //var_dump($viewData->capas);
        $this->load->view("index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "capa/add";

        $viewData->auth = get_active_user();

        $viewData->status = $this->ustatus_model->get_all();

        $viewData->suppliers = $this->supplier_model->get_all();
        $viewData->companies = $this->company_model->get_all();


        var_dump($viewData->suppliers);
        var_dump($viewData->companies);

        $this->load->view("index", $viewData);
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "capa/edit";

        $viewData->auth = get_active_user();

        $viewData->capa = $this->capa_model->get(array('capaID' => $id));
        $viewData->status = $this->ustatus_model->get_all();

        $viewData->suppliers = $this->supplier_model->get_all();
        $viewData->companies = $this->company_model->get_all();

        if (!$viewData->capa) {
            redirect(base_url("capa"));
        } else {
            $this->load->view("index", $viewData);
        }
    }

    public function save()
    {
        $CAPANAME           = strip_tags($this->input->post("capaname"));
        $SUPPLIER           = strip_tags($this->input->post("supplier"));
        $COMPANY            = strip_tags($this->input->post("company"));
        $NF                 = strip_tags($this->input->post("nf"));
        $SERIENF            = strip_tags($this->input->post("serienf"));
        $OC                 = strip_tags($this->input->post("oc"));
        $EMISSIONDT         = strip_tags($this->input->post("emissiondt"));

        $orgDate = "11/05/2021";  // (DD/MM/YYYY)
        $date = str_replace('/', '-', $EMISSIONDT);
        $newDate = date("Y-m-d", strtotime($date));        

        $this->load->library("form_validation");

        $this->form_validation->set_rules("capaname", "", "required");
        $this->form_validation->set_rules("nf", "", "required");

        if ($this->form_validation->run()) {

            $save = $this->capa_model->add(
                array(                    
                    "SUPPLIERID"                  => $SUPPLIER,
                    "COMPANYID"                   => $COMPANY,
                    "NAME"                        => $CAPANAME,
                    "NF"                          => $NF,
                    "SERIENF"                     => $SERIENF,
                    "OC"                          => $OC,
                    "EMISSIONDT"                  => $newDate
                )
            );


            if ($save) {
                redirect(base_url("capa"));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("capa/add"));
            }
        } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("capa/add"));
        }
    }

    // public function update($id)
    // {
    //     $viewData = new stdClass();

    //     $CNPJ         = strip_tags($this->input->post("cnpj"));
    //     $NAME         = strip_tags($this->input->post("name"));

    //     $this->load->library("form_validation");

    //     $this->form_validation->set_rules("cnpj", "", "required");
    //     $this->form_validation->set_rules("name", "", "required");

    //     if ($this->form_validation->run()) {

    //         $update = $this->capa_model->update(
    //             array("capaID" => $id),
    //             array(
    //                 "CNPJ"                  => $CNPJ,
    //                 "NAME"                  => $NAME,                    
    //             )
    //         );

    //         if ($update) {
    //             redirect(base_url("capa/edit/$id"));
    //         } else {
    //             redirect(base_url("capa"));
    //         }
    //     } else {
    //         $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
    //         redirect(base_url("capa/edit/$id"));
    //     }
    // }

    // public function delete($id)
    // {
    //     $delete = $this->capa_model->delete(array("capaID" => $id));

    //     if (!$delete) {
    //         redirect(base_url("capa"));
    //     } else {
    //         redirect(base_url("capa/edit/$id"));
    //     }
    // }
}