<?php

namespace Xana\GenHtml\Elements;

class OrderedList extends HtmlList{
	public function __construct(array $elements = [], array $attributes = [],){
		parent::__construct('ol', $attributes, $elements);
		$this->setText($this->text);
	}
}