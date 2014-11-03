<?php
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
require_once('../tcpdf_include.php');

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
if(isset($_SESSION['adult_voucher'])){
		$adult_voucher = $_SESSION['adult_voucher'];
}

if(isset($_SESSION['child_voucher'])){

$child_voucher = $_SESSION['child_voucher'];
}
		

// Set some content to print
$html = '
'.$adult_voucher.'
<br /> 
'.$child_voucher.'
';

// $html = '
					// <table width="650" height="317" border="1">
										  // <tr style="background-color:#FD8900;height: 60px;width:200px;">
											// <td style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</td>
											// <td colspan="2" style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
										  // </tr>
										  // <tr>
											// <td style="height: 60px;line-height:80px;" colspan="3">
												// &nbsp;&nbsp;
													// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Tour Title: </strong>
													// '.$row_voucher['title'].'
											// </td>
										  // </tr>
										  // <tr>
											// <td style="height: 60px;line-height:80px;">
											// &nbsp;&nbsp;
												// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Booking Date:</strong>
												// '.$row_voucher['start_date'].'
												
											// </td>
											 // <td style="height: 60px;line-height:80px;" colspan="2">
												// &nbsp;&nbsp;
													// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Adult Name:</strong>
													// '.$adult_row['first_name'].'
												
											// </td>
										  // </tr>
										  // <tr>
											// <td colspan="3">
												 // <p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; padding:20px 30px 20px 130px; margin:0px;">
												// Please hand this voucher to our representative at the start of your tour.
												// our representative will meet you in the immigration hall of airport, holding an <strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Example Tour</strong> signboard<br>
												// <br>
												// Emergency Contact No. +20 (0) 111111111 (Mr. An Example - mobile) 
												// (local tour organizer - for problems en-route or in the airport)
												// UK Emergency Contact No. +44 (0) 111111111 (Office hours) OR +44 (0) 222222222 (out of hour mobiles)
												// </p>
												// <br />
											// </td>
										  // </tr>
										  // <tr style="background-color:#323232;">
											// <td style="width:100px;color: #fff;font-size:12px;font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">Logo Company</td>
											// <td style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
											// <td style="width:118px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;">Signature</td>
										  // </tr>
										// </table>
										
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										// <br />
										
										// <table width="650" height="317" border="1">
										  // <tr style="background-color:#FD8900;height: 60px;width:200px;">
											// <td style="color:#fff; font-size:12px;font-weight:normal; display:block; line-height:60px; text-align:center; margin:0px; padding:0px;">ID: '.$row_voucher['id'].'</td>
											// <td colspan="2" style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
										  // </tr>
										  // <tr>
											// <td style="height: 60px;line-height:80px;" colspan="3">
												// &nbsp;&nbsp;
													// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Tour Title: </strong>
													// '.$row_voucher['title'].'
											// </td>
										  // </tr>
										  // <tr>
											// <td style="height: 60px;line-height:80px;">
											// &nbsp;&nbsp;
												// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Booking Date:</strong>
												// '.$row_voucher['start_date'].'
												
											// </td>
											 // <td style="height: 60px;line-height:80px;" colspan="2">
												// &nbsp;&nbsp;
													// <strong style="color: #FD8900;font-size:12px; margin:20px 10px 0px 0px;">Adult Name:</strong>
													// '.$adult_row['first_name'].'
												
											// </td>
										  // </tr>
										  // <tr>
											// <td colspan="3">
												 // <p style="color: #666;font-size:12px;font-weight:normal; display:block; line-height:18px; padding:20px 30px 20px 130px; margin:0px;">
												// Please hand this voucher to our representative at the start of your tour.
												// our representative will meet you in the immigration hall of airport, holding an <strong style="color: #FD8900;font-size:12px; margin:0px 10px 0px 0px;">Example Tour</strong> signboard<br>
												// <br>
												// Emergency Contact No. +20 (0) 111111111 (Mr. An Example - mobile) 
												// (local tour organizer - for problems en-route or in the airport)
												// UK Emergency Contact No. +44 (0) 111111111 (Office hours) OR +44 (0) 222222222 (out of hour mobiles)
												// </p>
												// <br />
											// </td>
										  // </tr>
										  // <tr style="background-color:#323232;">
											// <td style="width:100px;color: #fff;font-size:12px;font-weight:normal; display:block; margin:0px; padding:0px; line-height:80px; text-align:center;">Logo Company</td>
											// <td style="width:450px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;"><strong>Tour Confirmation Voucher</strong></td>
											// <td style="width:118px; height:80px; color:#FFF; font-size:18px; text-align:center; line-height:80px;">Signature</td>
										  // </tr>
										// </table>
// ';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
