<?php

namespace MakeWeb\WordpressInspector;

class Plugin
{
    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->{lcfirst($key)} = $value;
        }
    }
}