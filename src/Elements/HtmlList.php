<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

abstract class HtmlList extends HtmlElement{
	protected string $type;

	/**
	 * @param string $type
	 * @param array  $attributes
	 */
	public function __construct(string $type, array $attributes = []){
		parent::__construct($type, $attributes);
		$this->type              = $type;
		$this->defaultClasses    = 'list-group';
		$this->hasDefaultClasses = true;
	}

	public function addItem(ListItem $element): HtmlList{
		return parent::addElement($element);
	}
}
