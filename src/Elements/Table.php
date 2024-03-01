<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Table extends HtmlElement{
	private array $rows;

	public function __construct(array $attributes = [], array $rows = []){
		parent::__construct('table', $attributes);
		$this->rows = $rows;
	}

	public function addRow(TableRow $row): self{
		$this->rows[] = $row;

		return $this;
	}

	public function render(): string{
		$this->elements = $this->rows;

		return parent::render();
	}
}
