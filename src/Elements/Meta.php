<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Meta extends HtmlElement{
	public function __construct(string $name, string $content){
		parent::__construct("meta", [
			"name"    => $name,
			"content" => $content
		]);
	}
}