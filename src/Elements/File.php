<?php

namespace Xana\GenHtml\Elements;

class File extends AbstractInput{
	public function __construct(string $name, array $attributes = []){
		parent::__construct("file", $name, $attributes);
	}
}