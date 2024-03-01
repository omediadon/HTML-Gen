<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Link extends HtmlElement{
	public function __construct(string $href, string $text, string $target = '_self', array $attributes = []){
		$linkAttributes = [
			'href'   => $href,
			'target' => $target,
		];
		parent::__construct('a', array_merge($linkAttributes, $attributes));
		$this->setText($text);
	}

}
