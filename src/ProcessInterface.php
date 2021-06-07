<?php declare(strict_types=1);

/**
 * contains process interface
 *
 * @package         tourBase
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

namespace DavidLienhard\Process;

/**
 * contains methods to start, check and kill system processes
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
interface ProcessInterface
{
    /**
     * starts a process by using exec() and returns the process id
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           string          $command        the command to start
     */
    public static function start(string $command) : int;

    /**
     * checks if a process is running
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int             $pid        the process id to check
     */
    public static function check(int $pid) : bool;

    /**
     * kills a process
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int             $pid        the process id to kill
     */
    public static function kill(int $pid) : bool;
}
