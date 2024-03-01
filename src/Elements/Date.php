<?php

namespace Xana\GenHtml\Elements;

class Date extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("date", $name, $attributes);
	}
}