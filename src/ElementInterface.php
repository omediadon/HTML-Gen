<?php

namespace Xana\GenHtml;
use Xana\GenHtml\Visitor\ElementVisitor;

interface ElementInterface {
    public function render(): string;
    public function accept(ElementVisitor $visitor): string;
    public function setAttribute(string $name, string $value): self;
    public function addClass(string $class): self;
}