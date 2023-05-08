<?php

class Capa_model extends CI_Model
{

    public $tableName = "capa";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all($where = array(), $order = "CAPAID ASC")
    {
        // return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
        
        $this->db->order_by($order);        
        $this->db->where($where);
        $this->db->join('company', 'capa.COMPANYID = company.COMPANYID', 'left');
        $this->db->join('supplier', 'capa.SUPPLIERID = supplier.SUPPLIERID', 'left');
        $this->db->select('capa.CAPAID, capa.NAME, capa.EMISSIONDT, capa.NF, capa.OC, capa.SERIENF, company.CNPJ companyCNPJ, company.NAME companyNAME, company.LOGO companyLOGO, supplier.CNPJ supplierCNPJ, supplier.NAME supplierNAME, (SELECT COUNT(*) FROM item i where i.CAPAID = capa.CAPAID) totalChaves, (SELECT COUNT(*) FROM item i where i.CAPAID = capa.CAPAID and (i.SERIELICENSE is NULL OR TRIM(i.SERIELICENSE) = "")) totalChavesDisp');
        return $this->db->get($this->tableName)->result();
        
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }
}
