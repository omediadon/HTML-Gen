<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\Header;
use Xana\GenHtml\Elements\Meta;
use Xana\GenHtml\Elements\Span;
use Xana\GenHtml\Elements\GenericElement;
use Xana\GenHtml\Elements\Div;
use Xana\GenHtml\Factory\ElementFactory;

/**
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::escapeHtml
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 * @covers \Xana\GenHtml\HtmlElement::setText
 */
class MiscTest extends TestCase{

	/**
	 * @covers \Xana\GenHtml\Elements\Header::__construct
	 * @covers \Xana\GenHtml\Elements\Header::level
	 */
	public function testHeader(){
		$table = new Header(1, 'header');

		$this->assertEquals('<h1 >header</h1>', $table->render());
		$this->expectException(\InvalidArgumentException::class);

		new Header(99,"any");
	}

	/**
	 * @covers \Xana\GenHtml\Elements\Meta::__construct
	 * @covers \Xana\GenHtml\HtmlElement::noDefaults
	 * @covers \Xana\GenHtml\HtmlElement::selfClosing
	 */
	public function testMeta(){
		$table = new Meta('meta', 'header');

		$this->assertEquals('<meta name="meta" content="header" />', $table->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\Span::__construct
	 */
	public function testSpan(){
		$table = new Span('meta');

		$this->assertEquals('<span >meta</span>', $table->render());
	}

	public function testGeneric(){
		ElementFactory::registerCustomElement('rating-stars', function($attributes) {
				$element = new Div(array_merge(['class' => 'rating'], $attributes));
				for ($i = 0; $i < 5; $i++) {
						$element->addElement(new GenericElement('span', ['class' => 'star']));
				}
				return $element;
		});

		$form = ElementFactory::createElement('rating-stars');

		$this->assertEquals('<div class="rating"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>', $form->render());
	}

}
