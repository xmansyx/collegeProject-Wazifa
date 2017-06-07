<?php
include_once('../libs/fpdf181/fpdf.php');
include_once('database.php');
//require './DbConnection.php';
//$db =new database();

class PDF extends FPDF
{

//Page header
function Header()
{

    //Logo
   $this->Image('job.jpg',10,8,33,20);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,10,'Report#1 All users',1,0,'C');
    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
   // $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
function EventTable($array)
{
    $this->SetFont('','B','24');
    //$this->Cell(40,10,$event,15);
    $this->Ln();

    $this->SetXY( 10, 45 );

    $this->SetFont('','B','10');
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);
    $this->SetDrawColor(92,92,92);
    $this->SetLineWidth(.3);

   // $this->Cell(30,7,"ID",1,0,'C',true);
    $this->Cell(30,7,"firstname",1,0,'C',true);
    $this->Cell(30,7,"lastname",1,0,'C',true);
    $this->Ln();
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');

    $fill = false;
	foreach($array as $a)
    {
        $this->SetFont('Times','I',10);
    $this->Cell(30,7,$a['firstname'],1,0,'C',true);
    $this->Cell(30,7,$a['lastname'],1,0,'C',true);
    $this->ln();
        $fill =! $fill;
    }
    
    $this->Cell(160,0,'','T');
}
}
$pdf=new PDF();
$db=new database();
if (isset($_GET['kind'])) {
	if ($_GET['kind']=='likes') {
		$array=$db->showalllikes();

	}
	elseif ($_GET['kind']=='comment') {
		$array=$db->showallcomments();

	}
	elseif ($_GET['kind']=='user') {
		$array=$db->showallusers();

	}
}
else{
	header('Location: ../admin panel.php');
}
//$result2Array=$db->showallposts();
//$result3Array=$db->showallcomments();
//$result4Array=$db->showallusers();


if (count($array)!=0) {
	$pdf->AddPage();
$pdf->EventTable($array);
$pdf->SetFont("Arial", "B", "20");
//$pdf->Cell(90,10, "welcome to my first page",0,0,"l");
$pdf->Ln(5);
$pdf->SetFont("Arial", "I", "20");
$pdf->cell(91,10,"signature :.............",0,1);
//$pdf->Image("logo.jpg", 170, 10, 40,40 ,"jpg");
$pdf->Output();
}
else{
	header('Location: ../admin panel.php');
}

//echo '<a href="VerbAce-pro.exe">download</a>';
?>

