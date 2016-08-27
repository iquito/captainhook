<?php
/**
 * This file is part of HookMeUp.
 *
 * (c) Sebastian Feldmann <sf@sebastian.feldmann.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace HookMeUp\Config;

/**
 * Class Action
 *
 * @package HookMeUp
 * @author  Sebastian Feldmann <sf@sebastian-feldmann.info>
 * @link    https://github.com/sebastianfeldmann/hookmeup
 * @since   Class available since Release 0.9.0
 */
class Action
{
    /**
     * Action type
     *
     * @var string
     */
    private $type;

    /**
     * Action phpc lass or cli script
     *
     * @var string
     */
    private $action;

    /**
     * Map of options name => value
     *
     * @var array
     */
    private $options;

    /**
     * List of valid action types
     *
     * @var array
     */
    protected static $validTypes = ['php' => true, 'cli' => true];

    /**
     * Action constructor.
     *
     * @param  string $type
     * @param  string $action
     * @param  array  $options
     * @throws \Exception
     */
    public function __construct($type, $action, $options = [])
    {
        if (!isset(self::$validTypes[$type])) {
            throw new \Exception(sprintf('Invalid action type: %s', $type));
        }
        $this->type    = $type;
        $this->action  = $action;
        $this->options = $options;
    }

    /**
     * Type getter.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Action getter.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Return option map.
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Return config data.
     *
     * @return array
     */
    public function getJsonData()
    {
        return [
            'type'    => $this->type,
            'action'  => $this->action,
            'options' => $this->options,
        ];
    }
}