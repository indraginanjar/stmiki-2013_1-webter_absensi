<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php
//$text = file_get_contents(Yii::getPathOfAlias('webroot/assets') . DIRECTORY_SEPARATOR . 'README.md');
$text = file_get_contents(__DIR__ . '/../../../README.md');
$md = new CMarkdown;
echo $md->transform($text)
?>
