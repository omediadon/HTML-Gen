<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class TextArea extends HtmlElement{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("textarea", array_merge(['name' => $name], $attributes));
	}
}