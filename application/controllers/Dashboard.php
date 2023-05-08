<?php
class Dashboard extends CI_Controller
{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "dashboard_v";
        $this->load->model("capa_model");

        if (!get_active_user()) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

        $viewData->auth = get_active_user();
        $viewData->capas = $this->capa_model->get_all();

        //var_dump($viewData->capas);

        $this->load->view("index", $viewData);
    }

    public function notfound()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "error";

        $viewData->auth = get_active_user();

        $this->load->view("index", $viewData);
    }
}