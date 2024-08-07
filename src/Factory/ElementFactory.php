<?php

namespace Xana\GenHtml\Factory;

use Xana\GenHtml\Elements\GenericElement;
use Xana\GenHtml\ElementInterface;

class ElementFactory {
    private static array $customElements = [];

    public static function registerCustomElement(string $name, callable $factory): void {
        self::$customElements[$name] = $factory;
    }

    public static function createElement(string $name, array $attributes = []): ElementInterface {
        if (isset(self::$customElements[$name])) {
            return call_user_func(self::$customElements[$name], $attributes);
        }

        $className = __NAMESPACE__ . '\\' . ucfirst($name);
        if (class_exists($className)) {
            return new $className($attributes);
        }

        return new GenericElement($name, $attributes);
    }
}