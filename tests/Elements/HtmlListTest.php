<?php

namespace Xana\GenHtml\Tests\Elements;

use PHPUnit\Framework\TestCase;
use Xana\GenHtml\Elements\HtmlList;
use Xana\GenHtml\Elements\ListItem;
use Xana\GenHtml\Elements\OrderedList;
use Xana\GenHtml\Elements\UnorderedList;

/**
 * @covers \Xana\GenHtml\HtmlElement::__construct
 * @covers \Xana\GenHtml\HtmlElement::render
 * @covers \Xana\GenHtml\HtmlElement::setClasses
 * @covers \Xana\GenHtml\HtmlElement::addElement
 * @covers \Xana\GenHtml\HtmlElement::escapeHtml
 * @covers \Xana\GenHtml\HtmlElement::setText
 * @covers \Xana\GenHtml\AbstractElement::__construct
 */
class HtmlListTest extends TestCase{
	/**
	 * @covers \Xana\GenHtml\Elements\HtmlList::__construct
	 */
	public function test__construct(){
		$list = new class('ol') extends HtmlList{
		};

		$this->assertEquals('<ol class="list-group"></ol>', $list->render());
	}

	/**
	 * @covers \Xana\GenHtml\Elements\HtmlList::__construct
	 * @covers \Xana\GenHtml\Elements\ListItem::__construct
	 * @covers \Xana\GenHtml\Elements\UnorderedList::__construct
	 * @covers \Xana\GenHtml\Elements\OrderedList::__construct
	 * @covers \Xana\GenHtml\Elements\HtmlList::addItem
	 */
	public function testAddItem(){
		$list          = (new OrderedList())->addItem(new ListItem("item"));
		$listUnordered = (new UnorderedList())->addItem(new ListItem("item"));

		$this->assertEquals('<ol class="list-group"><li class="list-group-item">item</li></ol>', $list->render());
		$this->assertEquals('<ul class="list-group"><li class="list-group-item">item</li></ul>', $listUnordered->render());
	}
}
