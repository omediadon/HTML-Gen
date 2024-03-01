<?php

namespace Xana\GenHtml\Elements;

class Phone extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("phone", $name, $attributes);
	}
}