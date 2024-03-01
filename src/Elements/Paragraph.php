<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Paragraph extends HtmlElement{
	public function __construct(string $text = "", array $attributes = [],){
		parent::__construct("p", $attributes);
		$this->setText($text);
	}
}
