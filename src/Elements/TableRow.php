<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TableRow extends HtmlElement{
	protected array $cells;
	protected bool  $isHeader = false;

	public function __construct(?string $element = null, array $cells = []){
		parent::__construct($element != null ? $element : 'tr');
		$this->cells = $cells;
	}

	public function addCell(TableCell $cell): self{
		$this->cells[] = $cell;

		return $this;
	}

	public function render(): string{
		foreach($this->cells as $cell){
			if($this->isHeader){
				$cell = $cell->asHeading();
			}
			$this->elements[] = $cell;
		}

		return parent::render();
	}
}
