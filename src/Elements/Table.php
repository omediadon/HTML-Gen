<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Table extends HtmlElement{
	public function __construct(array $attributes = []){
		parent::__construct('table', $attributes);
		$this->defaultClasses = 'table table-bordered table-hover';
	}

	public function addRow(TableRow $row): static{
		$this->elements[] = $row;

		return $this;
	}
}
