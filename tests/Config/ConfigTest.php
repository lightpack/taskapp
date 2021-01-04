<?php

use PHPUnit\Framework\TestCase;

define('APP_ENV', 'development');
define('DIR_CONFIG', __DIR__ . '/tmp');

final class ConfigTest extends TestCase
{
    public function testConfigData()
    {
        $config = new \Framework\Config\Config(['app', 'db']);
        $this->assertEquals('Lightpack', $config->app['name']);
        $this->assertEquals('test_db', $config->db['name']);
    }

    public function testConfigFileNotFoundException()
    {
        $this->expectException(\Framework\Exceptions\ConfigFileNotFoundException::class);
        new \Framework\Config\Config(['app', 'db', 'session']);
    }
}