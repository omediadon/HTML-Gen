<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Select extends HtmlElement{
	private array   $options = [];
	private ?string $selectedValue;

	public function __construct(string $name, array $attributes = [], array $options = [], bool $multiple = false, string $selectedValue = null,){
		$initArres  = [
			"name"     => $name,
			'multiple' => $multiple
		];
		$attributes = $multiple ? array_merge($initArres, $attributes) : array_merge(["name" => $name], $attributes);
		parent::__construct("select", $attributes,);
		$this->options       = $options;
		$this->selectedValue = $selectedValue;
	}

	public function addEmptyOption(): self{
		$this->options[] = [
			"value"      => "",
			"text"       => "-- Please Select --",
			"attributes" => [],
		];

		return $this;
	}

	public function addOption(string $value, string $text, array $attributes = [],): self{
		$this->options[] = [
			"value"      => $value,
			"text"       => $text,
			"attributes" => $attributes,
		];

		return $this;
	}

	public function setSelected(string $value): self{
		$this->selectedValue = $value;

		return $this;
	}

	public function render(): string{
		foreach($this->options as $option){
			$optionAttributes = [];
			if(!empty($option["attributes"])){
				foreach($option["attributes"] as $key => $value){
					$optionAttributes[$key] = $value;
				}
			}
			$selected         = !empty($option["selected"]) ? "selected" : null;
			$this->elements[] = new SelectOption($option["text"], $selected, $optionAttributes);
		}

		return parent::render();
	}
}