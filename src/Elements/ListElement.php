<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class ListElement extends HtmlElement{
	public function __construct(string $text = "", array $attributes = [],){
		parent::__construct('li', $attributes, []);
		$this->setText($text);
	}
}