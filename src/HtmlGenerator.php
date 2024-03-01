<?php

namespace Xana\GenHtml;

class HtmlGenerator{
	private array $elements;
	public function __construct(array $elements)
	{
		$this->elements = $elements;
	}
	public function render(): string
	{
		$html = "";
		foreach ($this->elements as $element) {
			$html .= $element->render();
		}
		return $html;
	}
}