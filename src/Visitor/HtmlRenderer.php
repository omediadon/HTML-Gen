<?php
namespace Xana\GenHtml\Visitor;
use Xana\GenHtml\ElementInterface;

class HtmlRenderer implements ElementVisitor {
    public function visit(ElementInterface $element): string {
        $method = 'render' . (new \ReflectionClass($element))->getShortName();
        return method_exists($this, $method) ? 
            $this->$method($element) : 
            $this->renderGenericElement($element);
    }

    private function renderGenericElement(AbstractElement $element): string {
        $attributes = $this->renderAttributes($element->getAttributes());
        return "<{$element->getTagName()}{$attributes}>{$element->getText()}</{$element->getTagName()}>";
    }

    private function renderAttributes(array $attributes): string {
        return implode('', array_map(
            fn($key, $value) => " $key=\"" . htmlspecialchars($value, ENT_QUOTES) . "\"",
            array_keys($attributes),
            $attributes
        ));
    }

    // Add specific render methods for other elements as needed
}