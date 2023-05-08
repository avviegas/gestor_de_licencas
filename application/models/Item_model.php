<?php

class Item_model extends CI_Model
{

    public $tableName = "item";

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    public function get_all_items($where = array(), $order = "ITEMID ASC"){
        
        $this->db->order_by($order);        
        $this->db->where($where);
        $this->db->join('capa', 'capa.CAPAID = item.CAPAID', 'left');
        $this->db->select('item.ITEMID, item.KEYLICENSE, item.SERIELICENSE');
        return $this->db->get($this->tableName)->result();

    }


    public function get_all($where = array(), $order = "CAPAID ASC")
    {
        // return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
        
        $this->db->order_by($order);        
        $this->db->where($where);
        $this->db->join('company', 'capa.COMPANYID = company.COMPANYID', 'left');
        $this->db->join('supplier', 'capa.SUPPLIERID = supplier.SUPPLIERID', 'left');
        $this->db->select('capa.CAPAID, capa.EMISSIONDT, capa.NF, capa.OC, capa.SERIENF, company.CNPJ companyCNPJ, company.NAME companyNAME, supplier.CNPJ supplierCNPJ, supplier.NAME supplierNAME');
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
