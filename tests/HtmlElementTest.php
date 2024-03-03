<?php

namespace Xana\GenHtml\Tests;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\HtmlElement;

class HtmlElementTest extends TestCase{
	private HtmlElement $htmlElement;

	public function setUp(): void{
		$this->htmlElement = new class('div') extends HtmlElement{
		};
	}

	public function testId(){
		$html = $this->htmlElement->render();
		$this->assertEquals('<div ></div>', $html);
	}

	public function testKeepDefaultClasses(){}

	public function testRendereIf(){}

	public function testReplaceIf(){}

	public function testFlushAttribute(){}

	public function testRender(){}

	public function test__construct(){}

	public function testAddClass(){}

	public function testData(){}
}
