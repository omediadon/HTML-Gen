<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\Select;
use Xana\GenHtml\Elements\SelectOption;

/**
 * @covers \Xana\GenHtml\Elements\Select::__construct
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 * @covers \Xana\GenHtml\Elements\SelectOption::__construct
 * @covers \Xana\GenHtml\HtmlElement::escapeHtml
 * @covers \Xana\GenHtml\HtmlElement::setText
 * @covers \Xana\GenHtml\AbstractElement::__construct
 */
class SelectTest extends TestCase{
	public function test__construct(){
		$select = new Select('select');

		$this->assertEquals('<select name="select" class="form-control"></select>', $select->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\Select::addEmptyOption
	 * @covers \Xana\GenHtml\Elements\Select::addOption
	 */
	public function testAddEmptyOption(){
		$select = new Select('select', multiple: true);
		$select->addEmptyOption();

		/** @noinspection HtmlWrongAttributeValue */
		$this->assertEquals('<select name="select" multiple="1" class="form-control"><option value="">-- Please Select --</option></select>', $select->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\Select::addOption
	 */
	public function testAddOption(){
		$select = new Select('select');
		$select->addOption(new SelectOption('option', 1, selected: true));

		$this->assertEquals('<select name="select" class="form-control"><option selected="selected" value="1">option</option></select>', $select->render());
	}

}
