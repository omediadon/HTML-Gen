<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlContainer;

class Div extends HtmlContainer{
	public function __construct(array $attributes = []){
		$this->defaultClasses = 'row';
		parent::__construct("div", $attributes);
	}
}
