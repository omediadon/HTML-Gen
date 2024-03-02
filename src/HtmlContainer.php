<?php

namespace Xana\GenHtml;

abstract class HtmlContainer extends HtmlElement{
	public function addElement(HtmlElement $element): static{
		return parent::addElement($element);
	}
}
