<?php
class My_functions extends CI_Model
{
    function insert($tname, $data)
    {
        $this->db->insert($tname, $data);
        return $this->db->insert_id();
    }

    function select($tname)
    {
        return $this->db->get($tname)->result_array();
    }

    function select_where($tname, $cond)
    {
        return $this->db->where($cond)->get($tname)->result_array();
    }

    function delete($tname, $cond)
    {
        $this->db->where($cond)->delete($tname);
    }

    function update($tname, $cond, $data)
    {
        $this->db->where($cond)->update($tname, $data);
    }

    function create_table($tname, $arr)
    {
        $sql = "CREATE TABLE " . $tname . "(" . $tname . "_id int auto_increment primary key";
        foreach ($arr as $key => $value) {
            $sql .= ", " . $key . " text";
        }
        $sql .= ");";
        return ($this->db->query($sql));
    }

    // Filtering Functions

    // LIKE Query
    function select_like($tname, $column, $value)
    {
        return $this->db->like($column, $value)->get($tname)->result_array();
    }

    // NOT LIKE Query
    function select_not_like($tname, $column, $value)
    {
        return $this->db->not_like($column, $value)->get($tname)->result_array();
    }

    // OR LIKE Query
    function select_or_like($tname, $conds)
    {
        $this->db->or_like($conds);
        return $this->db->get($tname)->result_array();
    }

    // OR WHERE Query
    function select_or_where($tname, $conds)
    {
        $this->db->or_where($conds);
        return $this->db->get($tname)->result_array();
    }

    // WHERE IN Query
    function select_where_in($tname, $column, $values)
    {
        return $this->db->where_in($column, $values)->get($tname)->result_array();
    }

    // WHERE NOT IN Query
    function select_where_not_in($tname, $column, $values)
    {
        return $this->db->where_not_in($column, $values)->get($tname)->result_array();
    }

    // IS NULL Query
    function select_is_null($tname, $column)
    {
        return $this->db->where($column, NULL)->get($tname)->result_array();
    }

    // IS NOT NULL Query
    function select_is_not_null($tname, $column)
    {
        return $this->db->where($column . " IS NOT NULL")->get($tname)->result_array();
    }

    // Mathematical Operators Query
    function select_math_operator($tname, $column, $operator, $value)
    {
        if (in_array($operator, ['>', '<', '>=', '<='])) {
            return $this->db->where($column . ' ' . $operator, $value)->get($tname)->result_array();
        }
        return [];
    }

    // ORDER BY Query
    function select_order_by_multiple($tname, $columns)
    {
        foreach ($columns as $column => $order) {
            $this->db->order_by($column, $order);
        }
        return $this->db->get($tname)->result_array();
    }

    // LIMIT with OFFSET Query
    function select_limit_offset($tname, $limit, $offset)
    {
        return $this->db->limit($limit, $offset)->get($tname)->result_array();
    }

    // GROUP BY Query
    function select_group_by($tname, $column)
    {
        return $this->db->group_by($column)->get($tname)->result_array();
    }

    // Aggregate Functions
    function select_sum($tname, $column)
    {
        $this->db->select_sum($column);
        return $this->db->get($tname)->row_array();
    }

    function select_avg($tname, $column)
    {
        $this->db->select_avg($column);
        return $this->db->get($tname)->row_array();
    }

    function select_min($tname, $column)
    {
        $this->db->select_min($column);
        return $this->db->get($tname)->row_array();
    }

    function select_max($tname, $column)
    {
        $this->db->select_max($column);
        return $this->db->get($tname)->row_array();
    }

    // DISTINCT Query
    function select_distinct($tname, $column)
    {
        return $this->db->distinct()->select($column)->get($tname)->result_array();
    }

    // BETWEEN Query
    function select_between($tname, $column, $min, $max)
    {
        return $this->db->where("$column BETWEEN $min AND $max")->get($tname)->result_array();
    }

    // Transaction Handling
    function start_transaction()
    {
        $this->db->trans_start();
    }

    function commit_transaction()
    {
        $this->db->trans_complete();
    }

    function rollback_transaction()
    {
        $this->db->trans_rollback();
    }

    // Custom Raw Query Execution
    function execute_raw_query($query)
    {
        return $this->db->query($query)->result_array();
    }
}
?>
