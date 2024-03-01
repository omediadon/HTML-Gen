<?php

namespace Xana\GenHtml\Elements;

class Password extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("password", $name, $attributes);
	}
}