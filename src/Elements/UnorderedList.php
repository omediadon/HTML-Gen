<?php

namespace Xana\GenHtml\Elements;

class UnorderedList extends HtmlList{
	public function __construct(array $elements = [], array $attributes = [],){
		parent::__construct('ul', $attributes, $elements);
	}
}