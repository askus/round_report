<?php
require_once '../PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('../template/10207template.docx');

$document->setValue('date' , '102.7.8');
$document->setValue('text', '1. 公文一 2.  公文二 3. 公文三 ');

$document->save('testMyTemplate.docx');
?>
