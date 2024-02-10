<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	protected function ov($filename , $data="")
	{
		
		$this->load->view("admin/nav");
		$this->load->view("admin/".$filename, $data);
		$this->load->view("admin/footer");
		
	}

	
	public function index()
	{
		$this->ov('index');
		
	}
	public function add_category()
	{
		
		$data['category_list']=$this->My_model->select("category");
		$this->ov("add_category",$data);
		
	}
	public function save_category()
	{
		//print_r($_POST);
		$this->My_model->insert("category",$_POST);
		redirect(base_url()."admin/add_category");
		
	}
	public function remove_category($category_id)
	{
		$cond=["category_id"=>$category_id];
		$this->My_model-> delete ("category",$cond);
		redirect(base_url()."admin/add_category");
		
	}
	public function edit_category($category_id)
	{
		$cond=["category_id"=>$category_id];
		$this->My_model-> update  ("category",$cond);
		redirect(base_url()."admin/add_category");
		
	}

	public function add_Product()
	{
		
		$data['category_list']=$this->My_model->select("category");
		$this->ov("add_Product",$data);
		
	}
	
	public function slider_img_home()
	{
		
		$data['category_list']=$this->My_model->select("category");
		$this->ov("slider_img_home",$data);
		
	}
	public function show_slider_images() {
		$data['product_slider_image'] = $this->My_model->get_slider_images(); 
		$this->load->view('admin/slider_img_home', $data);
	}
	
	protected function upload($key)
	{
		// print_r($_FILES[$key]);
	   // $file_name=time().$_FILES[$key]['name'];
	   $file_name=time().$_FILES[$key]['name'];
	    move_uploaded_file($_FILES[$key]['tmp_name'],"uploads/".$file_name);
	    $_POST[$key]=$file_name;


	}

	public function save_slider_img_home()
	{
		$this->upload("image_url");
		$this->My_model->insert("product_slider_image",$_POST);
		redirect(base_url('admin/slider_img_home'));
	}
	public function save_product()
	{
		$this->upload("product_image");
		$this->My_model->insert("product",$_POST);
		redirect(base_url('admin/add_product'));
	}
	public function product_list()
	{
		// $data['products']=$this->My_model->select("product");
		$data['products']=$this->db->query("SELECT * FROM  product,category WHERE category.category_id =product.product_category")->result_array();
		$this->ov("product_list",$data);
	}

	public function pending_order()
	{
		$data['orders']=$this->My_model->select_where("order_tbl",["order_status"=>'pending']);
		$this->ov("pending_order",$data);
	}

	public function order_details($order_tbl_id)
	{
		$data['order_det']=$this->My_model->select_where("order_tbl",['order_tbl_id'=>$order_tbl_id]);
		$data['order_product_det']=$this->My_model->select_where("order_product_tbl",['order_tbl_id'=>$order_tbl_id]);

		$this->ov("order_details",$data);
	}
	public function send_to_dispach($order_tbl_id)
	{
	      // echo $order_tbl_id;
           $data['dispach_date']=date('y-m-d');
		   $data['dispach_time'] = date('h:ia');
		   $data['order_status']='dispach';   
		   $cond['order_tbl_id']=$order_tbl_id;
		   $this -> My_model -> update("order_tbl",$cond,$data);

		   redirect(base_url().'admin/pending_order');

	}


	 public function dispach_order()
	{
	      // echo $order_tbl_id;
          $data['orders']=$this->My_model->select_where("order_tbl",["order_status"=>'dispach']);
		$this->ov("dispach_order",$data);
	
	}

	 	 public function delivered_order()
	{
	      // echo $order_tbl_id;
          $data['orders']=$this->My_model->select_where("order_tbl",["order_status"=>'delivered']);
		$this->ov("delivered_order",$data);
	
	}

	public function send_to_delivered($order_tbl_id)
	{
		   // echo $order_tbl_id;
           $data['delivered_date']=date('y-m-d');
		   $data['delivered_time'] = date('h:ia');
		 
		   $data['order_status']='delivered';
		   $cond['order_tbl_id']=$order_tbl_id;
		   $this -> My_model -> update("order_tbl",$cond,$data);

		   redirect(base_url().'admin/dispach_order');



	     
	}

	public function send_to_reject($order_tbl_id)
	{
	      // echo $order_tbl_id;
           $data['rejected_date']=date('y-m-d');
		   $data['rejected_time'] = date('h:ia');
		   $data['order_status']='reject';
		   $cond['order_tbl_id']=$order_tbl_id;
		   $this -> My_model -> update("order_tbl",$cond,$data);

		   redirect(base_url().'admin/pending_order');



	}


	 public function reject_order()
	{
	      // echo $order_tbl_id;
          $data['orders']=$this->My_model->select_where("order_tbl",["order_status"=>'reject']);
		$this->ov("reject_order",$data);
	
	}

	
	public function payment_details()
	{
	      // echo $order_tbl_id;
          $data['orders']=$this->My_model->select_where("order_tbl",["order_status"=>'reject']);
		$this->ov("payment_details",$data);
	
	}
 
	
	
	

	
}
?>