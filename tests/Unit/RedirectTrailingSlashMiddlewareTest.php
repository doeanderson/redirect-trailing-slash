<?php

namespace DoeAnderson\RedirectTrailingSlash\Tests\Unit;

use Illuminate\Http\Request;
use DoeAnderson\RedirectTrailingSlash\Tests\TestCase;
use DoeAnderson\RedirectTrailingSlash\Http\Middleware\RedirectTrailingSlash;

class RedirectTrailingSlashMiddlewareTest extends TestCase
{
    /** @test */
    function it_removes_trailing_slash()
    {
        $request = Request::create('/some-page/', 'GET');
        $response = (new RedirectTrailingSlash())->handle($request, function () { });

        $this->assertEquals($response->getStatusCode(), 301);
    }

    /** @test */
    function it_preserves_homepage()
    {
      $request = Request::create('/', 'GET');
      $response = (new RedirectTrailingSlash())->handle($request, function () { });

      $this->assertEquals($response, null);
    }
}
