<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlContainer;

class Div extends HtmlContainer{
	public function __construct(array $attributes = []){
		$this->defaultClasses    = 'row';
		$this->hasDefaultClasses = true;
		parent::__construct("div", $attributes);
	}
}
