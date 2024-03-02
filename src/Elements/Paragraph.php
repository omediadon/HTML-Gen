<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;
use Xana\GenHtml\HtmlInlineContainer;

class Paragraph extends HtmlInlineContainer{
	public function __construct(string $text = "", array $attributes = [],){
		parent::__construct("p", $attributes);
		$this->setText($text);
	}
}
