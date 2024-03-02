<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;
use function array_merge;
use function array_unshift;

class Select extends HtmlElement{

	public function __construct(string $name, bool $multiple = false, array $attributes = []){
		$selectAttributes = [
			"name" => $name,
		];
		if($multiple){
			$selectAttributes['multiple'] = $multiple;
		}
		$this->defaultClasses = 'form-control';
		parent::__construct("select", array_merge($selectAttributes, $attributes));
	}

	public function addEmptyOption(): static{
		$emptyOption = new SelectOption('-- Please Select --');
		array_unshift($this->elements, $emptyOption);

		return $this;
	}

	public function addOption(SelectOption $option): static{
		$this->elements[] = $option;

		return $this;
	}
}
