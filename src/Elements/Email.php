<?php

namespace Xana\GenHtml\Elements;

class Email extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("email", $name, $attributes);
	}
}