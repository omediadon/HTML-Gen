<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Span extends HtmlElement{
	public function __construct(string $text = "", array $attributes = [],){
		parent::__construct("span", $attributes);
		$this->setText($text);
	}
}