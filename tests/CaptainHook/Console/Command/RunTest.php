<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace sebastianfeldmann\CaptainHook\Console\Command;

use sebastianfeldmann\CaptainHook\Console\IO\NullIO;
use sebastianfeldmann\CaptainHook\Git\DummyRepo;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Tests\Fixtures\DummyOutput;

class RunTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests Run::run
     */
    public function testExecute()
    {
        $run    = new Run();
        $output = new DummyOutput();
        $input  = new ArrayInput(
            [
                'hook'            => 'pre-push',
                '--configuration' => CH_PATH_FILES . '/config/valid.json',
                '--message'       => CH_PATH_FILES . '/git/message/valid.txt'
            ]
        );

        $run->setIO(new NullIO());
        $run->run($input, $output);
    }
}
