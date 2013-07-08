<?php
require_once 'lib/PHPWord/PHPWord.php';

// New Word Document
$PHPWord = new PHPWord();
$PHPWord->setDefaultFontName('標楷體');
$PHPWord->setDefaultFontSize(16);
// New portrait section
$section = $PHPWord->createSection();

$PHPWord->addFontStyle('rStyle', array('bold'=>true, 'size'=>20));
$PHPWord->addParagraphStyle('pStyle', array('align'=>'center'));
$section->addText('社會局綜合企劃科公文傳閱單', 'rStyle', 'pStyle');

// Add listitem elements
$PHPWord->addFontStyle('listFontStyle', array('size'=>16));
$PHPWord->addParagraphStyle('P-Style', array( '_spacing' =>10));
$listStyle = array('listType'=>PHPWord_Style_ListItem::TYPE_NUMBER_NESTED);
$section->addListItem('公文一', 0, 'listFontStyle', $listStyle, 'P-Style');
$section->addListItem('公文二', 0, 'listFontStyle', $listStyle, 'P-Style');
$section->addListItem('公文三', 0, 'listFontStyle', $listStyle, 'P-Style');
$section->addTextBreak(2);
// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('test.docx');
?>
