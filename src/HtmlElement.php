<?php

namespace Xana\GenHtml;

use function array_merge;
use function array_unique;
use function explode;
use function implode;
use function str_replace;

abstract class HtmlElement extends AbstractElement{
	protected array      $dontFlush          = [];
	protected string     $defaultClasses     = "";
	protected string     $tagName;
	protected array      $attributes         = [];
	protected array      $classes            = [];
	protected array      $elements           = [];
	protected array      $inlineElements     = [];
	protected string     $text               = "";
	private bool         $keepDefaultClasses = false;
	private bool         $selfClosing        = false;
	private ?HtmlElement $replacement        = null;
	private bool         $shouldRender       = true;

	public function __construct(string $tagName, array $attributes = []){
		parent::__construct($tagName, $attributes);
		$this->tagName    = $tagName;
		$this->attributes = $attributes;

	}

	public function render(): string{
		if($this->replacement != null){
			return $this->replacement->render();
		}
		if(!$this->shouldRender){
			return "";
		}
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
			$template = "<$this->tagName " . implode(" ",
													 $attributes) . ">" . $this->text . $innerHtml . "</{$this->tagName}>";
			foreach($this->inlineElements as $key => $inlineElement){
				$template = str_replace($key, $inlineElement->render(), $template);
			}
		}

		return $template;
	}

	private function setClasses(): void{
		// Combine default and existing classes, removing duplicates
		$shouldKeppDefaults        = empty($this->classes) && !isset($this->attributes['class']);
		$shouldCombineWithDefaults = ($this->keepDefaultClasses && !empty($this->defaultClasses)) || $shouldKeppDefaults;
		$mergedDefaults            = $shouldCombineWithDefaults && !empty($this->defaultClasses) ? explode(' ',
																										   $this->defaultClasses)
			: [];
		$this->classes             = array_unique(array_merge($mergedDefaults, $this->classes));

		// Integrate classes from attributes, removing duplicates
		if(!empty($this->attributes['class'])){
			$mergedClasses = array_merge($this->classes, explode(' ', $this->attributes['class']));
			$this->classes = array_unique($mergedClasses);
			unset($this->attributes['class']);
		}

		// Reconstruct the 'class' attribute with combined classes
		if(!empty($this->classes)){
			$this->attributes['class'] = implode(' ', $this->classes);
		}
	}

	public function addClass(string $class): static{
		$this->classes[] = $class;

		return $this;
	}

	public function replaceIf(bool $condition, HtmlElement $replacement): static{
		if($condition){
			$this->replacement = $replacement;
		}

		return $this;
	}

	public function flushAttribute(?string $name = null): static{
		if(!is_null($name) && !in_array($name, $this->dontFlush)){
			if($name === 'class'){
				$this->classes = [];
				if(!$this->keepDefaultClasses){
					$this->defaultClasses = '';
				}
			}
			else{
				if(isset($this->attributes[$name])){
					unset($this->attributes[$name]);
				}
			}
		}
		else if(is_null($name)){
			$filter = function($key){
				return in_array($key, $this->dontFlush);
			};
			if(!$this->keepDefaultClasses){
				$this->defaultClasses = '';
			}
			$this->classes    = [];
			$this->attributes = array_filter($this->attributes, $filter, ARRAY_FILTER_USE_KEY);
		}

		return $this;
	}

	public function id(string $id): static{
		$this->attributes['id'] = $id;

		return $this;
	}

	public function data(string $name, string $data): static{
		$this->attributes['data-' . $name] = $data;

		return $this;
	}

	public function keepDefaultClasses(): static{
		$this->keepDefaultClasses = true;

		return $this;
	}

	public function rendereIf(bool $condition): static{
		$this->shouldRender = $condition;

		return $this;
	}

	protected function selfClosing(): void{
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
		$this->defaultClasses = "";
	}

	protected function setText(string $text): static{
		$this->text = $this->escapeHtml($text);

		return $this;
	}

	protected function escapeHtml(string $text): string{
		return htmlspecialchars($text, ENT_QUOTES);
	}
}
