<?php

namespace Xana\GenHtml;

abstract class HtmlInlineContainer extends HtmlElement{
	public function addInlineElement(string $key, HtmlElement $element): static{
		return parent::addInlineElement('{' . $key . '}', $element);
	}

}
