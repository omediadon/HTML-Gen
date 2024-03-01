<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TableCell extends HtmlElement{

	public function __construct(string $content, array $attributes = []){
		parent::__construct('td', $attributes);
		$this->setText($this->escapeHtml($content)); // Escape HTML special characters
	}

	public function asHeading(): self{
		$this->tagName = 'th';

		return $this;
	}

}
