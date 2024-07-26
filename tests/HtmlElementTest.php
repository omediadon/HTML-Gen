<?php

namespace Xana\GenHtml\Tests;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\Div;
use Xana\GenHtml\Elements\Form;
use Xana\GenHtml\Elements\Image;
use Xana\GenHtml\Elements\LineBreak;
use Xana\GenHtml\Elements\Link;
use Xana\GenHtml\Elements\Paragraph;
use Xana\GenHtml\HtmlElement;

/**
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 */
class HtmlElementTest extends TestCase{
	private HtmlElement $htmlElement;

	public function setUp(): void{
		$this->htmlElement = new class('div') extends HtmlElement{
		};
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::id
	 * @covers \Xana\GenHtml\HtmlElement::flushAttribute
	 */
	public function testId(){
		$htmlElement = (clone $this->htmlElement)->id('test');
		$this->assertEquals('<div id="test"></div>', (clone $htmlElement)->render());
		$this->assertEquals('<div ></div>', (clone $htmlElement)->flushAttribute()
																->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::keepDefaultClasses
	 * @covers \Xana\GenHtml\HtmlElement::flushAttribute
	 * @covers \Xana\GenHtml\HtmlElement::addClass
	 */
	public function testKeepDefaultClasses(){
		$htmlElement = new class('div') extends HtmlElement{
			protected string $defaultClasses = "class";
		};

		$this->assertEquals('<div class="class"></div>', (clone $htmlElement)->render());
		$this->assertEquals('<div class="class another"></div>', (clone $htmlElement)->keepDefaultClasses()
																					 ->addClass("another")
																					 ->render());
		$this->assertEquals('<div class="another"></div>', (clone $htmlElement)->addClass("another")
																			   ->render());
		$this->assertEquals('<div ></div>', (clone $htmlElement)->flushAttribute()
																->render());
		$this->assertEquals('<div class="class"></div>', ($htmlElement)->addClass("another")
																	   ->keepDefaultClasses()
																	   ->flushAttribute()
																	   ->render());
		$this->assertEquals('<div class="class"></div>', ($htmlElement)->addClass("another")
																	   ->flushAttribute('class')
																	   ->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::rendereIf
	 */
	public function testRendereIf(){
		$this->assertEquals('<div ></div>', $this->htmlElement->render());
		$this->assertEquals('', (clone $this->htmlElement)->rendereIf(false)
														  ->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::replaceIf
	 * @covers \Xana\GenHtml\HtmlElement::id
	 * @covers \Xana\GenHtml\Elements\Form::__construct
	 */
	public function testReplaceIf(){
		$html = (clone $this->htmlElement)->id('test')
										  ->replaceIf(true, new Form('/', 'get'))
										  ->render();
		$this->assertEquals('<form action="/" method="get"></form>', $html);
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::flushAttribute
	 * @covers \Xana\GenHtml\Elements\Div::__construct
	 * @covers \Xana\GenHtml\HtmlElement::id
	 * @covers \Xana\GenHtml\HtmlElement::addClass
	 * */
	public function testFlushAttribute(){
		$html = (clone $this->htmlElement)->id('test')
										  ->addClass('test');
		$this->assertEquals('<div class="test"></div>', (clone $html)->flushAttribute('id')
																	 ->render());
		$this->assertEquals('<div ></div>', (clone $html)->flushAttribute()
														 ->render());
		$div = new Div();
		$this->assertEquals('<div ></div>', $div->flushAttribute('class')
												->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::id
	 * @covers \Xana\GenHtml\HtmlElement::render
	 */
	public function testRender(){
		$html = (clone $this->htmlElement)->id('test')
										  ->render();
		$this->assertEquals('<div id="test"></div>', $html);
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::__construct
	 */
	public function test__construct(){
		$htmlElement = new class('div') extends HtmlElement{
		};

		$this->assertEquals('<div ></div>', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::addClass
	 */
	public function testAddClass(){
		$html = (clone $this->htmlElement)->addClass('test')
										  ->addClass('another')
										  ->render();
		$this->assertEquals('<div class="test another"></div>', $html);
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::data
	 */
	public function testData(){
		$html = (clone $this->htmlElement)->data('data', 'test')
										  ->render();
		$this->assertEquals('<div data-data="test"></div>', $html);
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::selfClosing
	 * @covers \Xana\GenHtml\Elements\LineBreak::__construct
	 * @covers \Xana\GenHtml\HtmlElement::noDefaults
	 */
	public function testSelfClosing(){
		$this->assertEquals('<br  />', (new LineBreak())->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::addElement
	 * @covers \Xana\GenHtml\HtmlContainer::addElement
	 * @covers \Xana\GenHtml\Elements\Div::__construct
	 */
	public function testAddElement(){
		$this->assertEquals('<div class="row"><div class="row"></div></div>', (new Div())->addElement(new Div())
																						 ->render());
	}

	/**
	 * @covers \Xana\GenHtml\HtmlElement::addElement
	 * @covers \Xana\GenHtml\HtmlElement::setText
	 * @covers \Xana\GenHtml\HtmlElement::addInlineElement
	 * @covers \Xana\GenHtml\HtmlElement::escapeHtml
	 * @covers \Xana\GenHtml\HtmlInlineContainer::addInlineElement
	 * @covers \Xana\GenHtml\Elements\Link::__construct
	 * @covers \Xana\GenHtml\Elements\Paragraph::__construct
	 * @covers \Xana\GenHtml\Elements\Image::__construct
	 */
	public function testAddInlineElement(){
		$paragraph = (new Paragraph("Here is a {link}"))->addInlineElement('link', new Link('/', 'link'));
		$this->assertEquals('<p >Here is a <a href="/" target="_self">link</a></p>', $paragraph->render());
		$this->assertEquals('<p >and here is an <img src="/someimage.png" alt="alted"></img></p>',
							(new Paragraph('and here is an {image}'))->addInlineElement('image', new Image('/someimage.png', 'alted'))
																	 ->render());
	}

}
