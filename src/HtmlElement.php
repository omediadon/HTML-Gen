<?php

namespace Xana\GenHtml;

use function array_merge;

abstract class HtmlElement{
	protected string $defaultId    = "";
	protected string $defaultClass = "";
	protected string $tagName;
	protected array  $attributes   = [];
	protected array  $elements     = [];
	protected string $text         = "";
	private bool     $hasDefaults  = true;

	public function __construct(string $tagName, array $attributes = []){
		$this->tagName    = $tagName;
		$this->attributes = $attributes;
	}

	public function addElement(HtmlElement $element): self{
		$this->elements[] = $element;
		return $this;
	}

	public function render(): string{
		if($this->hasDefaults){
			$this->attributes = array_merge([
												"class" => $this->defaultClass,
												"id"    => $this->defaultId,
											], $this->attributes);
		}
		$attributes = [];
		foreach($this->attributes as $key => $value){
			$attributes[] = "$key=\"$value\"";
		}
		$innerHtml = "";
		foreach($this->elements as $element){
			$innerHtml .= $element->render();
		}
		return "<{$this->tagName} " . implode(" ", $attributes) . ">" . $this->text . $innerHtml . "</{$this->tagName}>";
	}

	protected function noDefaults(){
		$this->hasDefaults = false;
	}

	protected function setText(string $text): self{
		$this->text = $this->escapeHtml($text);
		return $this;
	}

	protected function escapeHtml(string $text): string{
		return htmlspecialchars($text, ENT_QUOTES);
	}
}
