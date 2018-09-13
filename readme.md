# MakeWeb Wordpress Inspector

Provides an API to easily access information about your Wordpress installation, it's themes and plugins.

## Installation

### With Composer

    composer require makeweb/wordpress-inspector
    
### Basic Usage

    require __DIR__.'/vendor/autoload.php';

    $inspector = new MakeWeb\WordpressInspector\Inspector;

    echo($inspector->themeName());

### ```MakeWeb\WordpressInspector\Inspector``` class API

#### ```themeName()```

Returns the name of the current theme.

#### ```themeVersion()```

Returns the version string of the current theme.

#### ```themeHasParent()```

Returns true if the current theme has a parent theme.

#### ```themeIsChild()```

Returns true if the current theme is a child theme.

#### ```usesDiviBuilder()```

Returns true if the Divi Builder plugin is installed.

#### ```parentThemeVersion()```

Returns the version string of the current theme's parent theme or `NULL` if the current theme has no parent theme.

#### ```parentThemeName()```

Returns the name of the current theme's parent theme or `NULL` if the current theme has no parent theme.