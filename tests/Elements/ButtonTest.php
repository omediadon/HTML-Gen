<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\Button;

/**
 * @covers \Xana\GenHtml\AbstractElement::__construct
 */
class ButtonTest extends TestCase{

	/**
	 * @covers  \Xana\GenHtml\Elements\Button::__construct
	 * @covers  \Xana\GenHtml\HtmlElement::__construct
	 * @covers  \Xana\GenHtml\HtmlElement::escapeHtml
	 * @covers  \Xana\GenHtml\HtmlElement::render
	 * @covers  \Xana\GenHtml\HtmlElement::setClasses
	 * @covers  \Xana\GenHtml\HtmlElement::setText
	 */
	public function test__construct(){
		$this->assertEquals('<button type="button" class="btn btn-primary">Click me:</button>', (new Button('Click me:'))->render());
	}
}
