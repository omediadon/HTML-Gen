<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

abstract class HtmlList extends HtmlElement{
	protected string $type;

	public function __construct(string $type, array $attributes = [], array $elements = [],){
		parent::__construct($type, $attributes, $elements);
		$this->type = $type;
	}
}