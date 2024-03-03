<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TextArea extends HtmlElement{
	public function __construct(string $name, array $attributes = []){
		$textAreaAttributes   = ['name' => $name];
		$this->defaultClasses = 'form-control';
		parent::__construct("textarea", array_merge($textAreaAttributes, $attributes));
	}
}
