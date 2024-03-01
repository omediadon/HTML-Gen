<?php

namespace Xana\GenHtml\Elements;

class OrderedList extends HtmlList{
	public function __construct(array $attributes = [],){
		parent::__construct('ol', $attributes);
	}
}
