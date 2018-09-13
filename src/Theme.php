<?php

namespace MakeWeb\WordpressInspector;

use WP_Theme;

class Theme
{
    public $wpThemeInstance;

    public static function fromWPTheme(WP_Theme $wpThemeInstance)
    {
        return (new self)->setWPThemeInstance($wpThemeInstance);
    }

    public function setWPThemeInstance(WP_Theme $wpThemeInstance)
    {
        $this->wpThemeInstance = $wpThemeInstance;

        return $this;
    }

    public function hasParent()
    {
        return (bool) $this->parent();
    }

    public function isChild()
    {
        return !$this->hasParent();
    }

    public function __get($property)
    {
        return $this->wpThemeInstance->$property;
    }

    public function __call($property, $args)
    {
        return $this->wpThemeInstance->$property(...$args);
    }
}
