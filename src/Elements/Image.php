<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Image extends HtmlElement{
	public function __construct(string $src, array $attributes = []){
		parent::__construct("img", array_merge(["src" => $src], $attributes));
	}
}