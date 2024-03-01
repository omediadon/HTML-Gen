<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Image extends HtmlElement{
	public function __construct(string $src, $alt = "", array $attributes = []){
		$imgAttributes = [
			"src" => $src,
			"alt" => $alt,
		];
		parent::__construct("img", array_merge($imgAttributes, $attributes));
	}
}
