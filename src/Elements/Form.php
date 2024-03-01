<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Form extends HtmlElement{
	public function __construct(array $attributes = [], array $elements = []){
		parent::__construct("form", $attributes, $elements);
	}
}