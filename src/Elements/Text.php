<?php

namespace Xana\GenHtml\Elements;

class Text extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("text", $name, $attributes);
	}
}