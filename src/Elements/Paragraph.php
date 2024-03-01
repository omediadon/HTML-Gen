<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Paragraph extends HtmlElement{
	public function __construct(string $text = "", array $attributes = [], array $elements = [],){
		parent::__construct("p", $attributes, $elements);
		$this->setText($text);
	}
}