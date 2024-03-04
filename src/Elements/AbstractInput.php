<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

abstract class AbstractInput extends HtmlElement{
	protected array $dontFlush = [
		'name',
		"type"
	];

	public function __construct(string $type, string $name, array $attributes = [],){
		$inputAttributes      = [
			"type" => $type,
			"name" => $name,
		];
		$this->defaultClasses = 'form-control';
		$this->selfClosing();
		parent::__construct("input", array_merge($inputAttributes, $attributes),);
	}

	public function name(string $name): static{
		$this->attributes['name'] = $name;

		return $this;
	}

	public function required(): static{
		$this->attributes["required"] = '';

		return $this;
	}

	public function placeholder(string $placeholder): static{
		$this->attributes['placeholder'] = $placeholder;

		return $this;
	}

	public function autoFocus(): static{
		$this->attributes['autofocus'] = '';

		return $this;
	}

	public function readOnly(): static{
		$this->attributes['readonly'] = '';

		return $this;
	}

	public function maxLength(int $length): static{
		$this->attributes['maxlength'] = $length;

		return $this;
	}

	public function minLength(int $length): static{
		$this->attributes['minlength'] = $length;

		return $this;
	}

	public function value(string $value): static{
		$this->attributes['value'] = $value;

		return $this;
	}
}
