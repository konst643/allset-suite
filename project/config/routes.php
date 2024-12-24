<?php
    use \Core\Route;

    return [
        new Route('/hello/', 'Hello', 'sayhi'),
        new Route('/test/:var1/:var2/', 'Test', 'index')
    ];
    