<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class In extends CI_Controller {

	
	protected function ov($filename,$data="")
	{
		$nav_data['cat_list']=$this->My_model->select("category");
		if (isset($_SESSION['user_tbl_id']))
		 {
			$nav_data['cart_qty']=count($this->My_model->select_where("user_cart",['user_tbl_id'=>$_SESSION['user_tbl_id']]));
		}
		$this->load->view("user/nav",$nav_data);
		$this->load->view("user/".$filename,$data);
		$this->load->view("user/footer");

	}

	public function index()
	{
		$data['new_products']=$this->My_model->newProducts();
		$data['slider_image']=$this->My_model->select("product_slider_image");
		$this->ov('index',$data);
		
	}
	public function view_products()
	{
		$cond=["product_category"=>$_GET['cat_id']];
		$data['prod_list']=$this->My_model->select_where("product",$cond);
		$this->ov("view_products",$data);
	}
	
	public function product_detail($product_id)
	{
		$cond=["product_id"=>$product_id];
		$data['product_det']=$this->My_model->select_where("product",$cond);

		if(isset($_SESSION['user_tbl_id']))
		{
		$cond=["product_id"=>$product_id,"user_tbl_id "=>$_SESSION['user_tbl_id']];
		$data['cart']=$this->My_model->select_where("user_cart",$cond);		
	}

		$this->ov("product_detail",$data);
	}


	public function login()
	{
		$this->ov("login");
	}
	
	public function register_user()
	{
		//print_r($_POST);
		
		$this->My_model->insert("user_tbl",$_POST);
		
		redirect(base_url()."in/login");
	}

	public function login_process()
	{
		//   Tring To Mobile
		$cond=["usermobile"=>$_POST['email_mobile'],"password"=>$_POST['password']];
		$loginbymobile=$this->My_model->select_where("user_tbl",$cond);

		if(!isset($loginbymobile[0]))
		{

			// Not By Mobile, Tring To Email
		$cond=["useremail"=>$_POST['email_mobile'],"password"=>$_POST['password']];
		$loginbyemail=$this->My_model->select_where("user_tbl",$cond);
		$login_data=$loginbyemail;

		}
		else
		{
			// By mobile
			$login_data=$loginbymobile;
		}
		if(isset($login_data[0]))
		{
			$_SESSION ['user_tbl_id']=$login_data[0]['user_tbl_id'];
			$_SESSION ['username']=$login_data[0]['username'];
			// print_r($_SESSION);
			// echo "Login Success";
			redirect(base_url());
		}
		else
		{
			redirect(base_url()."in/login");
			// echo "Login Failed";
		}
		
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url());

	}

	public function add_to_cart($product_id)
	{
		// echo "<br>";
		// echo "Product ".$product_id;
		// echo "<br>";
		// echo "User ".$_SESSION['user_tbl_id'];
		// echo "<br>";
		// echo "Qty - 1";

		if (isset($_SESSION['user_tbl_id']))
		 {
			
		$data=[
			"product_id"=>$product_id,
			"user_tbl_id "=>$_SESSION['user_tbl_id'],
			"qty"=>1
		];

		    
		if(!isset($cart[0]))

		$this->My_model->insert("user_cart",$data);

		redirect(base_url()."in/product_detail/".$product_id);
		// history.back()
		// location.href=document.referrer
	    }
		else
		{
			redirect(base_url()."in/login");
		}
    }

	public function cart()
	{
		$data['cart_list']=$this->My_model->cart_data();
		$this->ov("cart",$data);
	}

	public function inc_qty()
	{
		// $_POST['user_cart_id']
		$this->My_model->inc_qty($_POST['user_cart_id']);
		$data=$this->My_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];
		$res=["status"=>"success","data"=>$data];
		echo json_encode($res);

	}

	public function dec_qty()
	{
		// $_POST['user_cart_id']
		$data=$this->My_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];
			if ($data['qty']>1) 
			{
				$this->My_model->dec_qty($_POST['user_cart_id']);
			}
		
		$data=$this->My_model->select_where("user_cart",["user_cart_id"=>$_POST['user_cart_id']])[0];
		$res=["status"=>"success","data"=>$data];
		echo json_encode($res);

	}

	public function confirm_order()
	{
		$data['cart_list']=$this->My_model->cart_data();	
		$this->ov("confirm_order",$data);
	}


	public function place_order()
	{
		$cart_data=$this->My_model->cart_data();	

		$ttl=0;
		foreach ($cart_data as $key => $row)
		 {
			$ttl=$ttl+$row['qty']*$row['product_price'];
		}

		echo "<pre>";
		$_POST['user_tbl_id']=($_SESSION['user_tbl_id']);
		$_POST['customer_name']=($_SESSION['username']);
		$_POST['order_date']=date('Y-m-d');
		$_POST['order_amt']=$ttl;
		$_POST['order_status']="pending";
		//$this->My_model->insert("order_tbl",$_POST);
		$order_tbl_id=$this->My_model->insert("order_tbl",$_POST);
		// echo $order_tbl_id;

		// echo "<pre>";
		// print_r($cart_data);
		// echo "</pre>";

		foreach ($cart_data as $key => $row)
		 {
		 	$order_products['order_tbl_id']=$order_tbl_id;
		 	$order_products['user_tbl_id']=$_SESSION['user_tbl_id'];
			$order_products['product_id']=$row['product_id'];
		 	$order_products['qty']=$row['qty'];
		 	$order_products['product_name']=$row['product_name'];
		 	$order_products['product_price']=$row['product_price'];
		 	$order_products['product_company']=$row['product_company'];
		 	$order_products['product_color']=$row['product_color'];
		 	$order_products['product_detail']=$row['product_detail'];
		 	$order_products['product_image']=$row['product_image'];
			
		 	$this->My_model->insert("order_product_tbl",$order_products);

		 }
		 $this->My_model->delete("user_cart",['user_tbl_id'=>$_SESSION['user_tbl_id']]);
		 redirect(base_url()."in/track_order/".$order_tbl_id);
	}  


	public function track_order($order_tbl_id)
	{
		$data['order_det']=$this->My_model->select_where("order_tbl",["order_tbl_id"=>$order_tbl_id]);
		
		$data['order_product_det']=$this->My_model->select_where("order_product_tbl",["order_tbl_id"=>$order_tbl_id]);

		$this->ov("track_order",$data);
		
		//echo $order_tbl_id;
	}

	public function razorPaySuccess()
    { 
     $data = [
               'user_id' => '1',
               'payment_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount'),
               'product_id' => $this->input->post('product_id'),
            ];
     $insert = $this->db->insert('payments', $data);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
    }
    public function RazorThankYou()
    {
     $this->load->view('razorthankyou');
    }

}
?>