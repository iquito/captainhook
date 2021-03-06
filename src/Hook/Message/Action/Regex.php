<?php
/**
 * This file is part of CaptainHook.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace sebastianfeldmann\CaptainHook\Hook\Message\Action;

use sebastianfeldmann\CaptainHook\Config;
use sebastianfeldmann\CaptainHook\Console\IO;
use sebastianfeldmann\CaptainHook\Exception\ActionFailed;
use sebastianfeldmann\CaptainHook\Git\Repository;
use sebastianfeldmann\CaptainHook\Hook\Action;

/**
 * Class Regex
 *
 * @package CaptainHook
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/sebastianfeldmann/captainhook
 * @since   Class available since Release 1.0.0
 */
class Regex implements Action
{
    /**
     * Execute the configured action.
     *
     * @param  \sebastianfeldmann\CaptainHook\Config         $config
     * @param  \sebastianfeldmann\CaptainHook\Console\IO     $io
     * @param  \sebastianfeldmann\CaptainHook\Git\Repository $repository
     * @param  \sebastianfeldmann\CaptainHook\Config\Action  $action
     * @throws \Exception
     */
    public function execute(Config $config, IO $io, Repository $repository, Config\Action $action)
    {
        $regex = $this->getRegex($action->getOptions());

        if (!preg_match($regex, $repository->getCommitMsg()->getContent())) {
            throw ActionFailed::withMessage('Commit message did not match regex: ' . $regex);
        }
    }

    /**
     * Extract regex from options array.
     *
     * @param  \sebastianfeldmann\CaptainHook\Config\Options $options
     * @return string
     * @throws \sebastianfeldmann\CaptainHook\Exception\ActionFailed
     */
    protected function getRegex(Config\Options $options)
    {
        $regex = $options->get('regex');
        if (empty($regex)) {
            throw ActionFailed::withMessage('No regex option');
        }
        return $regex;
    }
}
