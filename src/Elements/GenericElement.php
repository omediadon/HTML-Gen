<?php

namespace Xana\GenHtml\Elements;

use Xana\GenHtml\HtmlElement;

class GenericElement extends HtmlElement{
  public function __construct(string $tagName, array $attributes = []) {
      parent::__construct($tagName, $attributes);
  }
}
