<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class Link extends HtmlElement{
	private string $href;
	private string $target;

	public function __construct(string $href, string $text, array $attributes = [], string $target = '_self'){
		parent::__construct('a', array_merge(['href' => $href], $attributes));
		$this->text   = $this->escapeHtml($text);
		$this->target = $target;
		$this->href   = $href;
	}

	public function render(): string{
		$attributes = [];
		foreach($this->attributes as $key => $value){
			$attributes[] = "$key=\"$value\"";
		}

		return "<{$this->tagName} href=\"{$this->href}\" target=\"{$this->target}\" " . implode(' ', $attributes) . ">" . $this->text . "</{$this->tagName}>";
	}
}