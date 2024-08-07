<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\AbstractInput;
use Xana\GenHtml\Elements\Date;
use Xana\GenHtml\Elements\Email;
use Xana\GenHtml\Elements\File;
use Xana\GenHtml\Elements\Password;
use Xana\GenHtml\Elements\Phone;
use Xana\GenHtml\Elements\Text;
use Xana\GenHtml\Elements\TextArea;

/**
 * @covers \Xana\GenHtml\Elements\AbstractInput::__construct
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\AbstractElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::selfClosing
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 */
class AbstractInputTest extends TestCase{
	private AbstractInput $htmlElement;

	public function setUp(): void{
		$this->htmlElement = new class('text', 'an-input') extends AbstractInput{
		};
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::maxLength
	 * @covers \Xana\GenHtml\Elements\Text::__construct
	 */
	public function testMaxLength(){
		$htmlElement = (new Text('textinput'))->maxLength(41);
		$this->assertEquals('<input type="text" name="textinput" maxlength="41" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::__construct
	 */
	public function test__construct(){
		$htmlElement = clone $this->htmlElement;
		$this->assertEquals('<input type="text" name="an-input" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::placeholder
	 * @covers \Xana\GenHtml\Elements\Date::__construct
	 */
	public function testPlaceholder(){
		$htmlElement = (new Date('date'))->placeholder('hold');
		$this->assertEquals('<input type="date" name="date" placeholder="hold" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::required
	 * @covers \Xana\GenHtml\Elements\File::__construct
	 */
	public function testRequired(){
		$htmlElement = (new  File("file"))->required();
		$this->assertEquals('<input type="file" name="file" required="" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::minLength
	 * @covers \Xana\GenHtml\Elements\Email::__construct
	 */
	public function testMinLength(){
		$htmlElement = (new Email("email"))->minLength(41);
		$this->assertEquals('<input type="email" name="email" minlength="41" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::value
	 * @covers \Xana\GenHtml\Elements\Phone::__construct
	 */
	public function testValue(){
		$htmlElement = (new Phone("an-input"))->value(41);
		$this->assertEquals('<input type="tel" name="an-input" value="41" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::autoFocus
	 * @covers \Xana\GenHtml\Elements\Password::__construct
	 */
	public function testAutoFocus(){
		$htmlElement = (new Password("an-input"))->autoFocus();
		$this->assertEquals('<input type="password" name="an-input" autofocus="" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::readOnly
	 */
	public function testReadOnly(){
		$htmlElement = (clone $this->htmlElement)->readOnly();
		$this->assertEquals('<input type="text" name="an-input" readonly="" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\AbstractInput::name
	 */
	public function testName(){
		$htmlElement = (clone $this->htmlElement)->name('another-name');
		$this->assertEquals('<input type="text" name="another-name" class="form-control" />', (clone $htmlElement)->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\TextArea::__construct
	 */
	public function testTextArea(){
		$table = new TextArea('meta');

		$this->assertEquals('<textarea name="meta" class="form-control"></textarea>', $table->render());
	}
}
