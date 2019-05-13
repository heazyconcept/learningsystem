<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->model("pricing");
		$this->load->model("betstore");
		$this->load->model("testimonials");
		$this->load->view('Front/Partials/Index');
	}
	public function leagues()
	{
		$this->load->model('leagues');
	   $this->load->view('Front/Partials/Leagues');
	   
	}
	public function about_us()
	{
       $this->load->view('Front/Partials/AboutUs');
	}
	public function contact_us()
	{
		$this->load->view("Front/Partials/Contact");
	}
	public function how_to_pay($country = "")
	{
		$data["mycountry"] = $country;
		$this->load->view("Front/Partials/HowToPay", $data);
	}
	public function terms()
	{
		$this->load->view("Front/Partials/TermsandCondition");
	}
}
