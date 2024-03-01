<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class SelectOption extends HtmlElement{

	public function __construct(string $text, ?string $selected = null, array $attributes = []){
		$attributes = !empty($selected) ? array_merge([
														  'selected' => $selected
													  ], $attributes) : $attributes;
		parent::__construct("option", $attributes);
		$this->setText($text);
	}
}