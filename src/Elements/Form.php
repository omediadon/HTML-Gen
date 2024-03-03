<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlContainer;
use function array_merge;

class Form extends HtmlContainer{
	protected array $dontFlush = [
		'action',
		'method'
	];

	public function __construct(string $action, string $method, array $attributes = []){
		$formAttributes = [
			'action' => $action,
			'method' => $method
		];
		parent::__construct("form", array_merge($formAttributes, $attributes));
	}
}
