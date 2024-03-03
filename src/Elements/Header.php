<?php

namespace Xana\GenHtml\Elements;

use InvalidArgumentException;
use Xana\GenHtml\HtmlElement;

class Header extends HtmlElement{
	public function __construct(int $level, string $text,){
		parent::__construct($this->level($level));
		$this->setText($text);
	}

	// Helper function for header level (optional)
	private function level(int $level): string{
		if($level < 1 || $level > 6){
			throw new InvalidArgumentException("Header level must be between 1 and 6.",);
		}

		return "h$level";
	}
}
