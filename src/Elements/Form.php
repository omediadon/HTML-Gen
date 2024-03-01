<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;
use function array_merge;

class Form extends HtmlElement{
	public function __construct($action = '', array $attributes = []){
		$formAttributes = ['action' => $action];
		parent::__construct("form", array_merge($formAttributes, $attributes));
	}
}
