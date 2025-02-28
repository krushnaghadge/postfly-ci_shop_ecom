<?php
class My_function extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('My_functions');
    }

    // Insert data
    public function insert()
    {
        $table = 'users';
        $data = $this->input->post();
        $insert_id = $this->My_functions->insert($table, $data);
        echo json_encode(['insert_id' => $insert_id]);
    }

    // Select all data
    public function select()
    {
        $table = 'users';
        $data = $this->My_functions->select($table);
        echo json_encode($data);
    }

    // Select data with conditions
    public function select_where()
    {
        $table = 'users';
        $condition = $this->input->post();
        $data = $this->My_functions->select_where($table, $condition);
        echo json_encode($data);
    }

    // Delete data
    public function delete()
    {
        $table = 'users';
        $condition = $this->input->post();
        $this->My_functions->delete($table, $condition);
        echo json_encode(['status' => 'deleted']);
    }

    // Update data
    public function update()
    {
        $table = 'users';
        $condition = $this->input->post('condition');
        $data = $this->input->post('data');
        $this->My_functions->update($table, $condition, $data);
        echo json_encode(['status' => 'updated']);
    }

    // Select like
    public function select_like()
    {
        $table = 'users';
        $column = $this->input->post('column');
        $value = $this->input->post('value');
        $data = $this->My_functions->select_like($table, $column, $value);
        echo json_encode($data);
    }

    // Select not like
    public function select_not_like()
    {
        $table = 'users';
        $column = $this->input->post('column');
        $value = $this->input->post('value');
        $data = $this->My_functions->select_not_like($table, $column, $value);
        echo json_encode($data);
    }

    // Select or like
    public function select_or_like()
    {
        $table = 'users';
        $conds = $this->input->post();
        $data = $this->My_functions->select_or_like($table, $conds);
        echo json_encode($data);
    }

    // Select or where
    public function select_or_where()
    {
        $table = 'users';
        $conds = $this->input->post();
        $data = $this->My_functions->select_or_where($table, $conds);
        echo json_encode($data);
    }

    // Select where in
    public function select_where_in()
    {
        $table = 'users';
        $column = $this->input->post('column');
        $values = $this->input->post('values');
        $data = $this->My_functions->select_where_in($table, $column, $values);
        echo json_encode($data);
    }

    // Select where not in
    public function select_where_not_in()
    {
        $table = 'users';
        $column = $this->input->post('column');
        $values = $this->input->post('values');
        $data = $this->My_functions->select_where_not_in($table, $column, $values);
        echo json_encode($data);
    }

    // Execute raw query
    public function execute_raw_query()
    {
        $query = $this->input->post('query');
        $data = $this->My_functions->execute_raw_query($query);
        echo json_encode($data);
    }
}
?>
