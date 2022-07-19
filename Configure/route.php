<?php

use Fratello\Henrietta\Router\Method;
use Fratello\Henrietta\Router\Response;

Method::get('/hello', function (){ Response::say(Response::http_ok(), "Hello"); });