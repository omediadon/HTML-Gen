<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

abstract class AbstractInput extends HtmlElement{
	public function __construct(string $type, string $name, array $attributes = [],){
		$inputAttributes    = [
			"type" => $type,
			"name" => $name,
		];
		$this->defaultClass = 'form-control';
		parent::__construct("input", array_merge($inputAttributes, $attributes),);
	}
}
