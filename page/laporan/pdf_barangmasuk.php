<?php
    function fetch_data(){
        $output = '';  
        $no = 1;
        $connect = mysqli_connect("localhost", "root", "", "inventori");  
        $sql = "select * from pemeliharaan";  
        $result = mysqli_query($connect, $sql);  
        while($data = mysqli_fetch_array($result)) 
        {
        $output .= '<tr style="color:black">
                    <td>'.$no++.'</td>
                    <td>'.$data["id_pemeliharaan"].'</td>
                    <td>'.$data["tanggal"].'</td>
                    <td>'.$data["kode_barang"].'</td>
                    <td>'.$data["nama_mesin"].'</td>
                    <td>'.$data["checklist"].'</td>
                    <td>'.$data["petugas"].'</td>
                    </tr>
                    ';  
        }  
        return $output; 
    }

    require_once('tcpdf/tcpdf.php');  
    
    class MyCustomPDFWithWatermark extends TCPDF {
        public function Header() {
            // Get the current page break margin
            $bMargin = $this->getBreakMargin();
    
            // Get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
    
            // Disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
    
            // Define the path to the image that you want to use as watermark.
            $img_file = './bg_pdf.jpeg';
    
            // Render the image
            $this->Image($img_file, 0, 0, 223, 280, '', '', '', false, 300, '', false, false, 0);
    
            // Restore the auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
    
            // Set the starting point for the page content
            $this->setPageMark();
        }
    }

    
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Laporan Pemeliharaan Mesin");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 12);  
    $pdf = new MyCustomPDFWithWatermark(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->AddPage();  

    $content = '';  
    $content .= '  
    <h3 align="center">Laporan Pemeliharaan Mesin</h3><br /><br />  
    <table border="1" cellspacing="0" cellpadding="5">  
        <tr>  
            <th width="5%">No</th>
            <th width="10%">ID</th>
            <th width="10%">Tanggal</th>
            <th width="10%">Kode</th>
            <th width="13%">Nama Mesin</th>
            <th width="40%">Checklist</th>
            <th width="12%">Petugas</th>
        </tr>  
    ';  
    $content .= fetch_data();  
    $content .= '</table>';  
    $pdf->writeHTML($content); 
    ob_end_clean();
    $pdf->Output();
?>