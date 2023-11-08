<?php
// application/modules/api/models/Item_model.php
class Item_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_items()
    {
        return $this->db->get('items')->result();
    }

    public function get_item($id)
    {
        return $this->db->get_where('items', ['id' => $id])->row_array();
    }

    public function create_item($data)
    {
        $this->db->insert('items', $data);
    }

    public function update_item($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('items', $data);
    }

    public function delete_item($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('items');
    }
}
