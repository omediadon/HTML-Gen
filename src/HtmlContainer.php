<?php

namespace Xana\GenHtml;

abstract class HtmlContainer extends HtmlElement{
	public function addElement(HtmlElement $element): HtmlElement{
		parent::addElement($element);

		return $this;
	}
}