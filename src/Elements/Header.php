<?php

namespace Xana\GenHtml\Elements;

use InvalidArgumentException;
use Xana\GenHtml\HtmlElement;

class Header extends HtmlElement{
	private int $level;

	public function __construct(int $level, string $text, array $attributes = [],){
		parent::__construct($this->h($level), $attributes);
		$this->setText($text);
	}

	// Helper function for header level (optional)
	private function h(int $level): string{
		if($level < 1 || $level > 6){
			throw new InvalidArgumentException("Header level must be between 1 and 6.",);
		}

		return "h$level";
	}
}