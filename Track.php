<?php
	ini_set("display_errors",'Off');
	date_default_timezone_set("Asia/Calcutta");
	class Track
	{
		public $ti=array();
		public $description=array();
		public $location=array();
		public function __construct($lo)
		{
			$t=date("Y-m-d h:i A");
			array_push($this->ti,$t);
			$d="Order Received";
			array_push($this->description,$d);
			$l=$lo;
			array_push($this->location,$lo);
		}
		public function add($lo,$de)
		{
			$t=date("Y-m-d h:i A");
			array_push($this->ti,$t);
			array_push($this->location,$lo);
			array_push($this->description,$de);
			return;
		}
		public function print1()
		{
			$output='';
			foreach ($this->ti as $key => $abc) {
				$output.='
						<tr>
							<td>'.$abc.'</td>
							<td>'.$this->location[$key].'</td>
							<td>'.$this->description[$key].'</td>
						</tr>
						';
			}
			//echo $output;
			return $output;
		}
	}
?>