<?php

namespace Xana\GenHtml\Visitor;
use Xana\GenHtml\ElementInterface;
interface ElementVisitor {
    public function visit(ElementInterface $element): string;
}