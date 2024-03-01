<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Div extends HtmlElement{
	public function __construct(array $attributes = [], array $elements = []){
		parent::__construct("div", $attributes, $elements);
	}
}