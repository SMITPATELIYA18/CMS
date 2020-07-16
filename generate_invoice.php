<?php
  session_start();
  if(!isset($_SESSION['user_name']))
    header("Location:index.php");
  $uname=$_SESSION['user_name'];
  $cid=$_GET['id'];
  ini_set('display_errors','Off');
  //$uname="Honey";
  //$cid=3;
	function fetch_data($uname,$cid)
	{
		$output='';
		$connect = mysqli_connect("localhost", "root", "", "courier_system");  
	    $sql = "SELECT * FROM consignment where con_id=$cid";  
	    //$result = mysqli_query($connect, $sql);  
	    $row=mysqli_fetch_assoc(mysqli_query($connect, $sql));
      $output.='<tr>
                  <td>'.$row['cdate'].'</td>
                  <td>'.$row['con_id'].'</td>
                  </tr>';
	    return $output; 
	}
  function fetch_data1($id)
  {
    $output='';
    $connect = mysqli_connect("localhost", "root", "", "courier_system");  
      $sql = "SELECT * FROM branch where branch_id='$id'";  
      $result = mysqli_query($connect, $sql);
      $row=mysqli_fetch_assoc($result);
      $add=$row['branch_add'];
      $output.=$add;
      $output.=' '.$row['pin_code'];
      return $output; 
  }
  function fetch_data2($uname,$cid)
  {
    $output='';
    $connect = mysqli_connect("localhost", "root", "", "courier_system");  
      $sql = "SELECT * FROM consumer where user_name='$uname' ";
      $sql1="SELECT * FROM consignment where con_id=$cid";
      $result = mysqli_query($connect, $sql);
      $row=mysqli_fetch_assoc($result);
      $result1= mysqli_query($connect, $sql1);
      $row1=mysqli_fetch_assoc($result1);
      $add=explode(",,", $row1['des_address']);
      $output .= '<tr>  
                      <td>'.$row['f_name'].' '.$row['l_name'].'</td>
                      <td>'.$row1['des_name'].'</td>
                      </tr>  
                          ';
      $output .= '<tr>  
                      <td>'.$row['add_line_1'].'</td>
                      <td>'.$add[0].'</td>
                      </tr>  
                          ';   
      $output .= '<tr>  
                      <td>'.$row['add_line_2'].'</td>
                      <td>'.$add[1].'</td>
                      </tr>  
                          ';
      $output .= '<tr>  
                      <td>'.$row['city'].'</td>
                      <td>'.$row1['destination'].'</td>
                      </tr>  
                          ';   
        return $output; 
  }
  function fetch_data3($uname,$cid)
  {
    $output='';
    $connect = mysqli_connect("localhost", "root", "", "courier_system");  
      $sql = "SELECT * FROM consignment where user_name='$uname' and con_id=$cid";  
      //$result = mysqli_query($connect, $sql);  
      $row=mysqli_fetch_assoc(mysqli_query($connect, $sql));
      $tax=0.12*$row['price'];
      $total=floor(0.5+$tax+$row['price']);
      $output.='
        <tr>
          <td>'.$row['source_pincode'].'</td>
          <td>'.$row['des_pincode'].'</td>
          <td>'.$row['pickup_date'].'</td>
          <td>'.$row['weight'].'</td>
          <td>'.$row['s_mode'].'</td>
          <td> Rs.'.$row['price'].'</td>
          <td> Rs.'.$tax.'</td>
          <td> Rs.'.$total.'</td>
        </tr>
      ';
      return $output;
  }
  function getIndianCurrency($number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    //$paise = ($decimal) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '');// . $paise .;
    }
	require_once('tcpdf/tcpdf.php');
  $conn=mysqli_connect("localhost","root","","courier_system");
  //$uname='Honey';
  //$con_id=2;
	$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $obj_pdf->SetCreator(PDF_CREATOR);  
    $obj_pdf->SetTitle("Consignment Invoice");  
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $obj_pdf->SetDefaultMonospacedFont('helvetica');  
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $obj_pdf->setPrintHeader(false);  
    $obj_pdf->setPrintFooter(false);  
    $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    $obj_pdf->SetFont('times', '', 14);  
    $obj_pdf->AddPage();
    $cotent='
    <div style="text-align:right;">
    <img width="100px" height="70px" src="images/logo.jpeg"></img>
        <h1 align="centre" style="color:blue;">Invoice</h1>
        <br/></div>
        <hr size="5px">';
    $obj_pdf->writeHTML($cotent);
    $cotent='<table width="100%">
                <tr>
                  <th width="50%">Order Date</th>
                  <th width="50%">Order ID</th>
                </tr>';
    $cotent.=fetch_data($uname,$cid);
    $cotent.='</table>';
    $obj_pdf->writeHTML($cotent);
    $cotent='<table width="100%">
              <tr>
                <th width="50%">PAN No: ASDEA4578E</th>
                <th width="50%">GSTIN: 24ASDEA4578E45D3</th>
              </tr>
            </table>';
    $obj_pdf->writeHTML($cotent);
    $connect = mysqli_connect("localhost", "root", "", "courier_system");  
    $sql = "SELECT * FROM consignment where con_id=$cid";  
    $result = mysqli_query($connect, $sql);  
    $row=mysqli_fetch_assoc($result);
    $id=$row['branch_sou_id'];
    $cotent='<table width="100%">
                <tr>
                  <th width="50%">Branch Address:</th>
                </tr>';
    $cotent.=fetch_data1($id);
    $cotent.='</table><br/><br/><br/><br/>';
    $obj_pdf->writeHTML($cotent);
    $cotent='<table width="100%">
                <tr>
                  <th width="50%">From:</th>
                  <th width="50%">To:</th>
                </tr>';
    $cotent.=fetch_data2($uname,$cid);
    $cotent.='</table><br/><br/><br/><br/>';
    $obj_pdf->writeHTML($cotent);
    $obj_pdf->SetFont('times', '', 10);
    $cotent='
        <table border="1" cellspacing="0" cellpadding="5">
            <tr>
                <th width="10%">Sou Pincode</th>
                <th width="10%">Des Pincode</th>
                <th width="13%">Pickup Date</th>
                <th width="10%">Weight</th>
                <th width="10%">Mode</th>
                <th width="12%">Taxable Value</th>
                <th width="14%">IGST</th>
                <th width="20%">Total</th>
            </tr>';
    $cotent.=fetch_data3($uname,$cid);
    $cotent.='</table><br/><br/><br/><br/>';
    $obj_pdf->writeHTML($cotent);
    $obj_pdf->SetFont('times', '', 14);
    $tax=0.12*$row['price'];
    $total=floor(0.5+$tax+$row['price']);
    $cotent='Total Price is Rs.'. $total;
    $obj_pdf->writeHTML($cotent);
    $cotent='The Price in Word '. getIndianCurrency($tax+$row['price']);
    $obj_pdf->writeHTML($cotent);
    $cotent='Payment Mode: Cash';
    $obj_pdf->writeHTML($cotent);
    $cotent='
    <div style="text-align:right;">
    <p style="font-size:16px">Signature</p>
    <img width="100px" height="70px" src="images/Signa.jpg"></img>
        </div>';
    $obj_pdf->writeHTML($cotent);
    $content=$obj_pdf->Output('Receipt', 'I');
?>