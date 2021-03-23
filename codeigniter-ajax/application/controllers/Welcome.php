<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->template->display_page('Welcome','home','welcome_message');
	}
	public function page1()
	{
		$this->template->display_page('Page 1','page1','content/page1');
	}
	public function page2()
	{
		$this->template->display_page('Page 2','page2','content/page2');
	}
	public function other()
	{
		$this->template->display_content('Other','','content/other');
	}
}
