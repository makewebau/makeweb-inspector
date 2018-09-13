<?php

namespace MakeWeb\WordpressInspector;

class Inspector
{
    public function __construct()
    {
        $this->theme = $this->getTheme();
    }

    public function themeVersion()
    {
        return $this->theme->version;
    }

    public function parentThemeVersion()
    {
        return $this->theme->hasParent() ? $this->theme->parent()->version : null;
    }

    public function themeName()
    {
        return $this->theme->name;
    }

    public function parentThemeName()
    {
        return $this->theme->parent()->name;
    }

    public function themeHasParent()
    {
        return $this->theme->hasParent();
    }

    public function themeIsChild()
    {
        return $this->theme->isChild();
    }

    public function getTheme()
    {
        return Theme::fromWPTheme(wp_get_theme());
    }

    /**
     * Returns true if either the theme is Divi or the parent theme is Divi
     */
    public function usesDiviTheme()
    {
        return $this->themeName() == 'Divi' || $this->parentThemeName() == 'Divi';
    }

    public function usesDiviBuilder()
    {
        return $this->getPlugins()->contains(function ($plugin) {
            return $plugin->name == 'Divi Builder';
        });
    }

    public function getPlugins()
    {
        return $this->collect(get_plugins())->map(function ($plugin) {
            return new Plugin($plugin);
        });
    }

    public function collect($array = null)
    {
        return new Collection($array);
    }
}
