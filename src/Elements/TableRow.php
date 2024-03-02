<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TableRow extends HtmlElement{
	protected array $cells;
	protected bool  $isHeader = false;

	/**
	 * @param TableCell[] $cells
	 * @param string|null $element
	 */
	public function __construct(?string $element = null){
		parent::__construct($element != null ? $element : 'tr');
	}

	public function addCell(TableCell $cell): static{
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
