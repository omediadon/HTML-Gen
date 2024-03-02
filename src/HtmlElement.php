<?php

namespace Xana\GenHtml;

use function array_merge;
use function array_unique;
use function explode;
use function implode;
use function str_replace;

abstract class HtmlElement{
	protected string $defaultClasses     = "";
	protected string $tagName;
	protected array  $attributes         = [];
	protected array  $classes            = [];
	protected array  $elements           = [];
	protected array  $inlineElements     = [];
	protected string $text               = "";
	private bool     $hasDefaults        = true;
	private bool     $keepDefaultClasses = false;
	private bool     $selfClosing        = false;

	public function __construct(string $tagName, array $attributes = []){
		$this->tagName    = $tagName;
		$this->attributes = $attributes;
	}

	public function render(): string{
		$this->setClasses();
		$attributes = [];
		foreach($this->attributes as $key => $value){
			$attributes[] = "$key=\"$value\"";
		}

		if($this->selfClosing){
			$template = "<$this->tagName " . implode(" ", $attributes) . " />";
		}
		else{
			$innerHtml = "";
			foreach($this->elements as $element){
				$innerHtml .= $element->render();
			}
			$template = "<$this->tagName " . implode(" ", $attributes) . ">" . $this->text . $innerHtml . "</{$this->tagName}>";
			foreach($this->inlineElements as $key => $inlineElement){
				$template = str_replace($key, $inlineElement->render(), $template);
			}
		}

		return $template;
	}

	private function setClasses(): void{
		/*if(empty($this->attributes['class']) && empty($this->classes) && $this->hasDefaults){
			$this->attributes['class'] = $this->defaultClasses;
			if(empty($this->attributes['class'])){
				unset($this->attributes['class']);
			}
			return;
		}
		if($this->keepDefaultClasses && $this->hasDefaults){
			$this->classes = array_unique(array_merge(explode(' ', $this->defaultClasses), $this->classes));
		}
		else{
			$this->classes = array_unique($this->classes);
		}
		if(!empty($this->attributes['class'])){
			$this->attributes['class'] = array_unique(explode(' ', $this->attributes['class']));
			$this->classes             = array_merge($this->attributes['class'], $this->classes);
		}
		$this->attributes['class'] = implode(' ', $this->classes);
		if(empty($this->attributes['class'])){
			unset($this->attributes['class']);
		}*/
		// Combine and de-duplicate classes if necessary
		if($this->hasDefaults){
			$explodedDefaults = ($this->keepDefaultClasses || (empty($this->classes && !isset($this->attributes['class'])))) ? explode(' ', $this->defaultClasses) : [];
			$this->classes    = array_unique(array_merge($explodedDefaults, $this->classes));
		}
		else{
			$this->classes = array_unique($this->classes);
		}

		// Handle $this->attributes['class']
		if(!empty($this->attributes['class'])){
			$this->attributes['class'] = array_unique(explode(' ', $this->attributes['class']));
			$this->classes             = array_merge($this->classes, $this->attributes['class']);
		}
		else{
			unset($this->attributes['class']);
		}

		// Set final class string in attributes
		$this->attributes['class'] = implode(' ', $this->classes);
	}

	public function addClass(string $class): static{
		$this->classes[] = $class;

		return $this;
	}

	public function keepDefaultClasses(): static{
		$this->keepDefaultClasses = true;

		return $this;
	}

	public function selfClosing(){
		$this->selfClosing = true;
	}

	protected function addElement(HtmlElement $element): static{
		$this->elements[] = $element;

		return $this;
	}

	protected function addInlineElement(string $key, HtmlElement $element): static{
		$this->inlineElements[$key] = $element;

		return $this;
	}

	protected function noDefaults(): void{
		$this->hasDefaults = false;
	}

	protected function setText(string $text): static{
		$this->text = $this->escapeHtml($text);

		return $this;
	}

	protected function escapeHtml(string $text): string{
		return htmlspecialchars($text, ENT_QUOTES);
	}
}
