<?php

session_start(); 
 include('include/database/db.php');
	// $user_id ="";
	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else
	{
		header('Location: index.php');
	}
	
	$booking_id = $_GET['booking_id'];
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
					 $adult_result = mysql_query("select COUNT(adult_child_status) as total_adult from traveler where booking_id = '".$booking_id."' AND user_id ='".$user_id."' AND adult_child_status='adult'");
					   while ($adult_row = mysql_fetch_array($adult_result)) {
								$total_adult = $adult_row['total_adult'];
						}
						  $child_result = mysql_query("select COUNT(adult_child_status) as total_child from traveler where booking_id = '".$booking_id."' AND user_id ='".$user_id."' AND adult_child_status='child'");
						   while ($child_row = mysql_fetch_array($child_result)) {
							$total_child = $child_row['total_child'];
						   }
					
					$trip_title =  $record['title'];
					$first_name =  $record['first_name'];
					$last_name =  $record['last_name'];
					$start_date =  $record['start_date'];
					$end_date =  $record['end_date'];
					$total_price =  $record['total_price'];
					$country =  $record['location_id'];
					$adult_child_status =  $record['adult_child_status'];
			
				}
// Set some content to print
$html = '
<table width="621" height="244" border="1">
					  <tr>
						<td>Destination:'.$country.'</td>
						<td colspan="2">Travel Date: '.$start_date.'</td>
					  </tr>
					  <tr>
						<td>'.$trip_title.'</td>
						<td>Adult: '.$total_adult.'</td>
						<td>Child: '.$total_child.'</td> 
					  </tr>
					  <tr>
						<td>&nbsp;</td>
						<td colspan="2">Total: '.$total_price.'</td>
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
