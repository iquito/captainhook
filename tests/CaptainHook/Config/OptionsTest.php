<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace sebastianfeldmann\CaptainHook\Config;

class OptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests Options::get
     */
    public function testGet()
    {
        $options = new Options(['foo' => 'bar']);
        $this->assertEquals('bar', $options->get('foo'));
    }

    /**
     * Tests Options::getOptions
     */
    public function testGetAll()
    {
        $options = new Options(['foo']);
        $this->assertEquals(['foo'], $options->getAll());
    }
}
