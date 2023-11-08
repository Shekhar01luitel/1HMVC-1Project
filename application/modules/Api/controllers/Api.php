<?php
// application/modules/api/controllers/Api.php
require APPPATH . 'libraries/REST_Controller.php';

class Api extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Item_model'); // Load the model
    }

    public function index_get()
    {
        echo'1';
        if (!empty($id)) {
            $data = $this->db->get_where("items")->row_array();
        } else {
            $data = $this->db->get("items")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

    // public function items_get($id = 0)
    // {
    //     if (!empty($id)) {
    //         $item = $this->item_model->get_item($id);
    //     } else {
    //         $item = $this->item_model->get_items();
    //     }

    //     $this->response($item, REST_Controller::HTTP_OK);
    // }

    public function index_post()
    {
        $data = $this->input->post();
        $this->Item_model->create_item($data);
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    }

    public function index_put($id)
    {
        $data = $this->put();
        $this->Item_model->update_item($id, $data);
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id)
    {
        // die();
        $this->Item_model->delete_item($id);
        $this->response(['Item deleted successfully.'.$id], REST_Controller::HTTP_OK);
    }
    public function home(){
        echo 'hi';
    }
}
