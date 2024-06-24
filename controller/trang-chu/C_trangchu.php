<?php
include 'controller/controller.php';
class C_trangchu extends Controller
{
	public function HienThiTrangChu()
	{
		return $this->loadView('home');
	}
	
}
?>