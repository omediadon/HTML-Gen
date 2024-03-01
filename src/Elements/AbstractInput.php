<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

abstract class AbstractInput extends HtmlElement{
	public function __construct(string $type, string $name, array $attributes = [],){
		parent::__construct("input", array_merge([
													 "type" => $type,
													 "name" => $name
												 ], $attributes),);
	}
}