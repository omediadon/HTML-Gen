<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Div extends HtmlElement{
	public function __construct(array $attributes = []){
		$this->defaultClass = 'row';
		parent::__construct("div", $attributes);
	}
}
