<?php
    date_default_timezone_set('Asia/Taipei');
    function getChineseDate( ){
        $year = (string)  ( (int) date("Y") - 1911) ;
        $month = date("n");
        $day = date("j");
        return sprintf("%s.%s.%s", $year, $month, $day) ;
    }


    $data =  $_POST['data'];
    $list_items = explode( "\n", $data );


    require('lib/fpdf17/chinese-unicode.php');

    $pdf = new PDF_Unicode();
    $pdf->AddPage();

    $pdf->AddUniCNShwFont("uni");
    $pdf->AddUniCNShwFont('uniKai', 'DFKaiShu-SB-Estd-BF');

    $pdf->SetFont('uniKai','B',20);
    $pdf->Cell(0,30,'社會局綜合企劃科公文傳閱單', 0 ,0, "C");
    $pdf->Ln(20);

    $pdf->SetFont('uniKai','',16);
    $pdf->Cell(0,20, '傳閱文件：');
    $pdf->Ln(10);
    $essay_array = $list_items; 
 //   $essay_array= array('102年6月28日中市社會字第1020055436號文。','《政風新聞》第145期。', '《新華報導》第288期。') ;

    // $i =1; 
    for( $i = 1 ; $i <= count( $essay_array) ; $i++ ){
        $essay = $essay_array[$i-1];
        $pdf->Cell(0 ,20, sprintf("  %d.  %s", $i ,$essay) ) ;
        $pdf->Ln(10);

    }
    $pdf->Ln();

    $person_row_1 = array("姓名", "張妗如\n科長", "賴金雀\n專員", "謝家雄", "陳淑菁", "朱德信", "黃鈺惠", "張世杰"); 
    $person_row_2 = array("姓名", "黃瓊儀", "王珮芸", "翁瑪麗", "呂世駿","", "","" );
    $person_data = array( $person_row_1 ,$person_row_2 );



    $cell_width = 24;
    $cell_height = 20;
    $pdf->SetFont('uniKai','B',16);

    foreach( $person_data as $person_row ){
        foreach( $person_row as $person  ){
            $x = $pdf->getX();
            $y = $pdf->getY();

            $this_cell_height = $cell_height / ( substr_count( $person, "\n") + 1 );

            $pdf->Multicell( $cell_width , $this_cell_height, $person, 1 , 'C');
            $pdf->setXY( $x + $cell_width, $y );
        }
        $pdf->Ln();
        for( $i= 0 ; $i < count( $person_row); $i++ ){
            if( $i == 0){ $w = "簽名"; }else{ $w = ""; }
            $pdf->Cell( $cell_width , $cell_height , $w, 1 ,0, 'C');
        }
        $pdf->Ln();
    }

    $pdf->SetFont('uniKai','B',22);

    $pdf->Cell(0, 20, '請   各   同   仁   儘   速   傳   閱', 0 , 0 , "C");
    $pdf->Ln(10);
    //$pdf->
    $pdf->SetFont('uniKai','B',16);
    $pdf->Cell(0, 20, sprintf( '%s 修正', getChineseDate() ) );

    $pdf->Output();

?>
    