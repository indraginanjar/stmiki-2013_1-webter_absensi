<?php
 
Yii::import('zii.widgets.grid.CGridView');
 
class CGridViewPlus extends CGridView {
 
    public $addingHeaders = array();
	public $columnPerRow;
	public $headerRow;

	private function filterColumnByDataHeaderRow() {
		
	}

    public function renderTableHeader() {
        if (!empty($this->addingHeaders)) {
        	//$this->multiRowHeader();
		//return;
	}
 
        //parent::renderTableHeader();
	$colPos = 0;
		if(!$this->hideHeader)
		{
			echo "<thead>\n";

			if($this->filterPosition===self::FILTER_POS_HEADER)
				$this->renderFilter();

			$rows = array(array());
			foreach($this->columns as $column) {
				$rowNumber = 0;
				if(isset($column->headerHtmlOptions['data-header_row'])){
					$rowNumber = $column->headerHtmlOptions['data-header_row'];
				}
				$rows[$rowNumber][] = $column;
			}
			foreach($rows as $row) {
				echo "<tr>\n";
				foreach($row as $cell) {
					$cell->renderHeaderCell();
				}
				echo "</tr>\n";
			}
			/*
			foreach($this->columns as $column) {
				$column->renderHeaderCell();
				if(isset($column->headerHtmlOptions['colspan'])) {
					$colPos += $column->headerHtmlOptions['colspan'];
				}
				else {
					$colPos++;
				}
				if($colPos >= $this->columnPerRow) {
					echo "</tr>\n<tr>";
					$colPos = 0;
				}
			}
			echo "</tr>\n";
			*/
			if($this->filterPosition===self::FILTER_POS_BODY)
				$this->renderFilter();

			echo "</thead>\n";
		}
		elseif($this->filter!==null && ($this->filterPosition===self::FILTER_POS_HEADER || $this->filterPosition===self::FILTER_POS_BODY))
		{
			echo "<thead>\n";
			$this->renderFilter();
			echo "</thead>\n";
		}
    }
 
    protected function multiRowHeader() {
        echo CHtml::openTag('thead') . "\n";
        foreach ($this->addingHeaders as $row) {
            $this->addHeaderRow($row);
        }
		if(!$this->hideHeader)
		{

			if($this->filterPosition===self::FILTER_POS_HEADER)
				$this->renderFilter();

			if($this->filterPosition===self::FILTER_POS_BODY)
				$this->renderFilter();

		}
		elseif($this->filter!==null && ($this->filterPosition===self::FILTER_POS_HEADER || $this->filterPosition===self::FILTER_POS_BODY))
		{
			$this->renderFilter();
		}
        echo CHtml::closeTag('thead') . "\n";
    }
 
    // each cell value expects array(array($text,$colspan,$options), array(...))
    protected function addHeaderRow($row) {
        // add a single header row
        echo CHtml::openTag('tr') . "\n";
        // inherits header options from first column
        $options = $this->columns[0]->headerHtmlOptions;
        foreach ($row as $header) {
		if(isset($header['colspan'])) {
			$options['colspan'] = $header['colspan'];
		}
		if(isset($header['options'])){
			$cellOptions=($header['options'] + $options);
		}
		else {
			$cellOptions=($options);
		}
		echo CHtml::openTag('th', $cellOptions);
		echo $header['text'];
		echo CHtml::closeTag('th');
        }
        echo CHtml::closeTag('tr') . "\n";
    }
 
}
?>
