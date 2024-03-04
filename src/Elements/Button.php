<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Button extends HtmlElement{
	public function __construct(string $text, array $attributes = []){
		parent::__construct("button", $attributes);
		$this->defaultClasses    = 'btn btn-primary';
		$this->setText($text);
	}
}
