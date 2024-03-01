<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TableCell extends HtmlElement{

	public function __construct(string $content, array $attributes = []){
		parent::__construct('td', $attributes);
		$this->setText($content);
	}

	public function asHeading(): self{
		$this->tagName = 'th';

		return $this;
	}

}
