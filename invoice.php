<?php
require('fpdf/fpdf.php');
/*$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'feelingsdb';
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM salesregister WHERE billNo = '4' ORDER BY billdate";
$res = $conn->query($sql);
 while($result=$res->fetch_object()){
    $billNo = $result->billNo;
 }
$conn->close();
*/
//Select the Products you want to show in your PDF file
class PDF extends FPDF
{

// Page header
function Header()
{
$id = $_GET['id'];
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'ssa_recipt_db';
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM tbl_recipt_record WHERE id = $id ORDER BY inserted_at";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
  // output data of each row
  while($result = $res->fetch_object()) {
    $name = strtoupper($result->name);
    $recipt_number = $result->recipt_number;
    $course = strtoupper($result->course);
    $recipt_date = new DateTime($result->recipt_date);
    $academic_year = $result->academic_year;
    $amount = $result->amount;
   }
} else {
  echo "0 results";
}

 
$conn->close();
$count = 0;
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    
    $this->Ln(3);
    $this->SetFont('Arial','B',15);
    $this->Cell(0,10,'S. S. AGRAWAL COLLEGE OF COMERECE AND MANAGEMENT,NAVSARI',0,0,'C');
   
    $this->Ln(10);
    $this->SetFont('Arial','',10);
    $this->Multicell(0,5,"VEERANJALI MARG,OPP VIDHYAKUNJ HIGH SCHOOL,GANDEVI ROAD,\nNAVSARI-396445 PHONE NO : 02637 232667/232857",0,'C');
    $this->SetFont('Arial','B',10);
    $this->Ln(5);
    $this->SetFont('Arial','B',20);
    $this->Cell(0,10,'Receipt',0,0,'C');
    $this->SetFont('Arial','B',10);
    $this->Ln(5);
    $this->Cell(190,5,"",'B','L',false);
  	


    $this->Ln(5);
    $this->Cell(140);
    $this->Cell(30,8,"Receipt Number : ",0,'L');
    $this->Cell(30,8,$recipt_number,0,'L');
    
    $this->Ln(8);
    $this->Cell(140);
    $this->Cell(20,8,"DATE : ",0,'L');
    $this->Cell(30,8,date_format($recipt_date, 'd-m-Y'),0,'L');
   
    $this->Ln(3);
    $this->Cell(140);
    $this->Cell(50,5,"",'B','L',false);
    
    $this->SetFont('Arial','',12);
   
    $this->Ln(10);
    $this->Cell(40,8,"Received Rupees",10,'L');
    $this->Cell(20,8,$amount."/-",'B','L',false);
    $this->Cell(38,8,"with thanks from",10,'L');
    $this->Cell(92,8,$name,'B','C',false);
    
    $this->Ln(10);
    $this->Cell(190,8,"towards  the  VNSGU  Online  Admission  Application  Registration  Fees  in  cash  for  the  course of",'','L',false);
    
   
    $this->Ln(10);
    
    $this->Cell(60,8,$course,'B','L',false);
    $this->Cell(35,8,".",'','L',false);
    $this->Ln(15);
    $this->Cell(35,8,"Academic Year",'','L',false);
    $this->Cell(40,8,$academic_year,'B','L',false);
    
    $this->Ln(10);
    $this->cell(160);
    $this->Cell(20,20,"",'LRTB','L',false);
   
    $this->Ln(15);
    $this->cell(160);
    $this->Cell(20,20,"Auth.Sign.",'','L',false);
}
}

// Instanciation of inherited class
$pdf = new PDF('L','mm',array(210,148));
$pdf->AliasNbPages();
$pdf->AddPage();    
$pdf->SetFont('Times','',12);
$pdf->SetDrawColor(0,0,0);


/*for($i=1;$i<=20;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,1,1);*/
$pdf->Output('I');


?>