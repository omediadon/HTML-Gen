<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class ListItem extends HtmlElement{
	public function __construct(string $text, array $attributes = [],){
		parent::__construct('li', $attributes);
		$this->setText($text);
		$this->defaultClasses    = 'list-group-item';
		$this->hasDefaultClasses = true;
	}
}
