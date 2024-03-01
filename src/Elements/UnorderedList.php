<?php

namespace Xana\GenHtml\Elements;

class UnorderedList extends HtmlList{
	public function __construct(array $attributes = [],){
		parent::__construct('ul', $attributes);
	}
}
