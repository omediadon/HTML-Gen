<?php

namespace Xana\GenHtml;

abstract class HtmlElement
{
	protected string $tagName;
	protected array $attributes = [];
	protected array $elements = [];
	protected string $text = "";
	public function __construct(
		string $tagName,
		array $attributes = [],
		array $elements = [],
	) {
		$this->tagName = $tagName;
		$this->attributes = $attributes;
		$this->elements = $elements;
	}
	public function addElement(self $element): self
	{
		$this->elements[] = $element;
		return $this;
	}
	public function setText(string $text): self
	{
		$this->text = $this->escapeHtml($text);
		return $this;
	}
	protected function escapeHtml(string $text): string
	{
		return htmlspecialchars($text, ENT_QUOTES);
	}
	public function render(): string
	{
		$attributes = [];
		foreach ($this->attributes as $key => $value) {
			$attributes[] = "$key=\"$value\"";
		}
		$innerHtml = "";
		foreach ($this->elements as $element) {
			$innerHtml .= $element->render();
		}
		return "<{$this->tagName} " .
			implode(" ", $attributes) .
			">" .
			$this->text .
			$innerHtml .
			"</{$this->tagName}>";
	}
}