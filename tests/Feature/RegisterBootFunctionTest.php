<?php

namespace Advalis\LaravelPlaywright\Tests\Feature;

use Advalis\LaravelPlaywright\Tests\TestCase;

class RegisterBootFunctionTest extends TestCase
{

    public function testRegistersBootFunction(): void
    {

        $this->postJson('/playwright/registerBootFunction', [
            'function' => 'Advalis\LaravelPlaywright\Tests\Feature\RegisterBootFunctionTest::setGlobalVariable',
        ])
            ->assertOk();

        $this->reloadApplication();
        $this->assertEquals('Yes', $GLOBALS['bootRunning']);

    }

    /**
     * This is called via the service container for testing purposes from the above test
     */
    public static function setGlobalVariable(): void
    {
        $GLOBALS['bootRunning'] = 'Yes';
    }

}