<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Button extends HtmlElement{
	protected array $dontFlush = [
		"type"
	];

	public function __construct(string $text, string $type = "button", array $attributes = []){
		$inputAttributes      = [
			"type" => $type,
		];
		$this->defaultClasses = 'btn btn-primary';
		parent::__construct("button", array_merge($inputAttributes, $attributes));
		$this->defaultClasses = 'btn btn-primary';
		$this->setText($text);
	}
}
