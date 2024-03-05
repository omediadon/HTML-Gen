<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;
use function array_merge;

class SelectOption extends HtmlElement{
	protected array $dontFlush = [
		'value',
	];

	public function __construct(string $text, string $value = '', bool $selected = false, array $attributes = []){
		$optionAttributes = ['value' => $value];
		if($selected){
			$optionAttributes = array_merge([
												'selected' =>'selected' ,
											], $optionAttributes);
		}

		parent::__construct("option", array_merge($optionAttributes, $attributes));
		$this->setText($text);
	}
}
