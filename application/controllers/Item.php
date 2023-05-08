<?php

class Item extends CI_Controller
{
    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();
        $this->viewFolder = "items_v";

        $this->load->model("item_model");
        $this->load->model("capa_model");
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
        $viewData->subViewFolder = "item/list";

        $viewData->auth = get_active_user();

        $viewData->capas = $this->capa_model->get_all();

        //var_dump($viewData->capas);

        $this->load->view("index", $viewData);
    }

    public function listid($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "item/listid";

        $CAPAID = $this->uri->segment('3');   
        
        $array = array(
            "capa.CAPAID"              => $CAPAID            
        );

        $viewData->status = $this->ustatus_model->get_all();
        $viewData->dataItems = $this->item_model->get_all_items($array);
        $viewData->dataCapa = $this->capa_model->get_all($array);
        $viewData->ID = $CAPAID;

        $this->load->view("index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "item/add";

        $viewData->auth = get_active_user();

        $CAPAID = $this->uri->segment('3');   
        
        $array = array(
            "CAPAID"              => $CAPAID            
        );

        $viewData->status = $this->ustatus_model->get_all();
        $viewData->dataCapa = $this->capa_model->get_all($array);

        //var_dump($viewData->dataCapa);

        $this->load->view("index", $viewData);
    }

    public function edit($id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "item/edit";

        $viewData->auth = get_active_user();

        $viewData->item = $this->item_model->get(array('ITEMID' => $id));
        $viewData->status = $this->ustatus_model->get_all();

        var_dump($viewData->item);

        if (!$viewData->item) {
            redirect(base_url("item"));
        } else {
            $this->load->view("index", $viewData);
        }
    }

    public function save()
    {
        $HIDDENID              = strip_tags($this->input->post("hiddenid"));        
        $KEYLIC                = strip_tags($this->input->post("keylic"));
        $SERIENUMBER           = strip_tags($this->input->post("serienumber"));

        $this->load->library("form_validation");

        $this->form_validation->set_rules("hiddenid", "", "required");        

        if ($this->form_validation->run()) {

            $save = $this->item_model->add(
                array(
                    "CAPAID"                  => $HIDDENID,
                    "KEYLICENSE"              => $KEYLIC,
                    "SERIELICENSE"            => $SERIENUMBER
                )
            );

            //var_dump($save);die;

            if ($save) {
                redirect(base_url("item/add/" . $HIDDENID));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("item/add"));
            }
       } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("item/add"));
       }
    }

    public function update()
    {
        $HIDDENID              = strip_tags($this->input->post("hiddenid"));
        $HIDDENCAPAID              = strip_tags($this->input->post("hiddenCapaid"));
        $KEYLIC                = strip_tags($this->input->post("keylic"));
        $SERIENUMBER           = strip_tags($this->input->post("serienumber"));

        //var_dump($HIDDENCAPAID);die;

        $this->load->library("form_validation");

        $this->form_validation->set_rules("hiddenid", "", "required");        

        if ($this->form_validation->run()) {

            $save = $this->item_model->update(
                array("ITEMID" => $HIDDENID),
                array(
                    "ITEMID"                  => $HIDDENID,
                    "KEYLICENSE"              => $KEYLIC,
                    "SERIELICENSE"            => $SERIENUMBER
                )
            );

            //var_dump($save);die;

            if ($save) {
                redirect(base_url("item/listid/" . $HIDDENCAPAID));
            } else {
                $this->session->set_flashdata('user_error', "Não registrado");
                redirect(base_url("item/add"));
            }
       } else {
            $this->session->set_flashdata('user_error', "Preencha os campos obrigatórios");
            redirect(base_url("item/add"));
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