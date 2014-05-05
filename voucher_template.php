<?php

session_start(); 
 include('include/database/db.php');
	// $user_id ="";
	//if(isset($_SESSION['user_id']))
	//{
		//$user_id = $_SESSION['user_id'];
	//}
	//else
	//{
		//header('Location: index.php');
	//}
	
	$booking_id = $_GET['booking_id'];
	$user_id = $_GET['user_id'];
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('our Booking');
$pdf->SetTitle('Tour Booking Ticket');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
// $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
session_start();
// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
		// if(isset($_SESSION['user_name2'])){
				// $user_name = $_SESSION['user_name2'];
		// }
		// if(isset($_SESSION['country'])){
		// $country = $_SESSION['country'];
		// }
		// if(isset($_SESSION['start_date'])){
		
		// $start_date = $_SESSION['start_date'];
		// }
		// if(isset($_SESSION['trip_title'])){
		// $trip_title = $_SESSION['trip_title'];
		// }
		// if(isset($_SESSION['N'])){
		// $N = $_SESSION['N'];
		// }
		// if(isset($_SESSION['N1'])){
		// $N1 = $_SESSION['N1'];
		// }
		// if(isset($_SESSION['total'])){
		// $total = $_SESSION['total'];
		// }
		
		$query ="SELECT
					booking.id,
					tour.title,
					tour.location_id,
					traveler.first_name,
					traveler.adult_child_status,
					payment.total_price,
					payment.`status`,
					traveler.last_name,
					traveler.sex,
					traveler.age,
					booking.start_date,
					booking.tour_id,
					booking.supplier_id,
					booking.end_date
					FROM
					booking
					INNER JOIN tour ON tour.id = booking.tour_id
					INNER JOIN traveler ON booking.id = traveler.booking_id
					INNER JOIN payment ON payment.id = booking.payment_id
					INNER JOIN `user` ON `user`.id = booking.user_id AND `user`.id = traveler.user_id AND `user`.id = payment.user_id AND `user`.id = traveler.user_id
					where booking.id='".$booking_id."' AND booking.user_id ='".$user_id."' GROUP BY tour.title
					";
					$result = mysql_query($query);
		while($record = mysql_fetch_array($result))
				{
					 $adult_result = mysql_query("select first_name, COUNT(adult_child_status) as total_adult from traveler where booking_id = '".$booking_id."' AND user_id ='".$user_id."' AND adult_child_status='adult'");
					   while ($adult_row = mysql_fetch_array($adult_result)) {
								$total_adult = $adult_row['total_adult'];
								$first_name_adult = $adult_row['first_name'];
						}
						  $child_result = mysql_query("select first_name , COUNT(adult_child_status) as total_child from traveler where booking_id = '".$booking_id."' AND user_id ='".$user_id."' AND adult_child_status='child'");
						   while ($child_row = mysql_fetch_array($child_result)) {
							$total_child = $child_row['total_child'];
							$first_name_child = $child_row['first_name'];
						   }
					
					$tour_id =  $record['tour_id'];
					$trip_title =  $record['title'];
					$first_name =  $record['first_name'];
					$last_name =  $record['last_name'];
					$start_date =  $record['start_date'];
					$end_date =  $record['end_date'];
					$total_price =  $record['total_price'];
					$country =  $record['location_id'];
					$adult_child_status =  $record['adult_child_status'];
					$supplier_id =  $record['supplier_id'];
					
				 
				}
				
	$supplier_result = mysql_query("select * from supplier where id = '".$supplier_id."'");
		while ($supplier_row = mysql_fetch_array($supplier_result))
		{
				$supplier_email = $supplier_row['email'];
				$company_name = $supplier_row['company_name'];
				$street_address = $supplier_row['street_address'];
				$phone = $supplier_row['phone'];
		}
// Set some content to print
$html = '
<table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="70" align="left" valign="top" bgcolor="#FD8900"><table width="100%%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="200" align="left" valign="middle"><img src="http://tourbookings.co/images/tourbooking_logo-small.png" width="156" height="67" style=" float:left; margin-left:25px;margin-right:65px; vertical-align:top; "/></td>
        <td width="450" align="left" valign="middle"><h1 style="width:100%; float:left; margin:0px; text-align:left; padding:0px; line-height:75px; font-family:Arial, Helvetica, sans-serif; font-size:24px; color:#fff; font-weight:bold; display:block; border:none;">Booking Confirmation Voucher</h1></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="border:#000 solid 1px;"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" align="left" valign="top">&nbsp;</td>
        <td align="center" valign="top" style="color: #585858;"><table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="6" align="left" valign="middle">&nbsp;</td>
      </tr> 
      <tr>
        <td colspan="6" align="left" valign="middle"><table width="620" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="middle"><div style=" margin:0px; padding:0px; float:left; font-size:14px !important; font-weight:bold; font-family:Arial, Helvetica, sans-serif; display:block; color:#323232; text-shadow:none !important;">Reservation information:</div></td>
              <td align="left" valign="middle"></td>
            </tr>
          </table></td>
        </tr>
      <tr>
        <td colspan="6" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td width="110" align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Traveler Name:</div></td>
        <td width="240" align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">'.$first_name_adult.'</div></td>
        <td width="100" align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Tour/Hotel::</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Tour</div></td>
        <td width="60" align="left" valign="middle">
		
		
		</td>
        <td align="left" valign="middle">
</td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Scheduled Date:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">'.$start_date.'</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Adult:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
'.$total_adult.'</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
		Child</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
'.$total_child.'</div></td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Destination:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">'.$country.'</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Total Price:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
$ '.$total_price.'.00</div></td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
    </table></td>
        <td width="15" align="right" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="border:#000 solid 1px;"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15" align="left" valign="top">&nbsp;</td>
        <td align="center" valign="top" style="color: #585858;"><table width="620" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" align="left" valign="middle"><table width="620" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="left" valign="middle"><div style=" margin:0px; padding:0px; float:left; font-size:14px !important; font-weight:bold; font-family:Arial, Helvetica, sans-serif; display:block; color:#323232;">Tour / Hotel information:</div></td>
              <td align="left" valign="middle">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      <tr>
        <td colspan="2" align="left" valign="middle">&nbsp;</td>
      </tr> 
      <tr>
        <td width="110" align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Company:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
'.$company_name.'</div></td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        </tr>
      <tr>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Address:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
'.$street_address.'</div></td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        </tr>
      <tr>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">Phone:</div></td>
        <td align="left" valign="middle"><div style="float:left; font-family:Arial, Helvetica, sans-serif; font-size:12px !important; padding:0px; margin:0px;">
'.$phone.'</div></td>
        </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle">&nbsp;</td>
        </tr>
    </table></td>
        <td width="15" align="right" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
