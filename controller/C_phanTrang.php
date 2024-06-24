<?php

class C_phanTrang
{
	public $pageHienTai;
	private $nhomHienTai;
	private $tongSoHang;
	private $tongSoPage;
	private $tongSoNhom;
	public $soHangTrenPage;
	private $soPageHienThi;
	private $url;
	public function __construct($_tongsohang,$_sohangtrenpage,$_sopagehienthi)
	{
		$this->pageHienTai = isset($_GET['page']) && intval($_GET['page']) > 0 ? intval($_GET['page']) : 1;
		$this->tongSoHang = $_tongsohang;
		$this->soHangTrenPage = $_sohangtrenpage;
		$this->soPageHienThi = $_sopagehienthi;
		$this->tongSoPage = ceil($this->tongSoHang/$this->soHangTrenPage);		
		$this->tongSoNhom = ceil($this->tongSoPage/$this->soPageHienThi);
		if($this->pageHienTai > $this->tongSoPage) $this->pageHienTai = 1;
		$this->nhomHienTai = ceil($this->pageHienTai/$this->soPageHienThi);
		//echo $this->nhomHienTai;
		$this->url = $_SERVER['REQUEST_URI'];
		if(isset($_GET['page'])){
			unset($_GET['page']);
			$this->url = urldecode('index.php?'.http_build_query($_GET));
		}
	}
	

	public function HienThiPhanTrang(){
		
		$start = '';
		$previous = '';
		if($this->nhomHienTai > 1){
			$start = '<li><a href="'.$this->url.'&page=1">Đầu trang</a></li>';
			$previous = '<li><a href="'.$this->url.'&page='.($this->nhomHienTai-1)*$this->soPageHienThi.'" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
						';
		}

		$end = '';
		$next = '';
		if($this->nhomHienTai < $this->tongSoNhom){
			$end = '<li><a href="'.$this->url.'&page='.$this->tongSoPage.'">Cuối trang</a></li>';
			$next = '<li><a href="'.$this->url.'&page='.(1+($this->nhomHienTai)*$this->soPageHienThi).'" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
						';
		}

		$listPage = '';
		for ($i= ($this->nhomHienTai-1)*$this->soPageHienThi+1; $i <= $this->nhomHienTai*$this->soPageHienThi; $i++) {
			if($i>$this->tongSoPage || $this->tongSoPage ==1) break;
			if($i == $this->pageHienTai){
				$listPage .= '<li class="active"><a href="#">'.$i.'</a></li>';
			}else{
				$listPage .= '<li><a href="'.$this->url.'&page='.$i.'">'.$i.'</a></li>';
			}
		}
		$html = '<ul class="pagination">'.$start.$previous.$listPage.$next.$end.'</ul>';
		//$html;
		return array('html'=>$html,'pageHienTai'=>$this->pageHienTai,'tongSoHang'=>$this->tongSoHang);
	}
}
?>