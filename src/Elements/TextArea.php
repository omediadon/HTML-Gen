<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TextArea extends HtmlElement{
	protected array $dontFlush = [
		'name',
	];

	public function __construct(string $name, array $attributes = []){
		$textAreaAttributes      = ['name' => $name];
		$this->defaultClasses    = 'form-control';
		$this->hasDefaultClasses = true;
		parent::__construct("textarea", array_merge($textAreaAttributes, $attributes));
	}
}
