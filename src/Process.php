<?php
/**
 * contains process class
 *
 * @package         tourBase
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */

declare(strict_types=1);

namespace DavidLienhard\Process;

use DavidLienhard\Process\ProcessInterface;

/**
 * contains methods to start, check and kill system processes
 *
 * @author          David Lienhard <github@lienhard.win>
 * @copyright       David Lienhard
 */
class Process implements ProcessInterface
{
    /**
     * starts a process by using exec() and returns the process id
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           string          $command        the command to start
     */
    public static function start(string $command) : int
    {
        $suffix = " > /dev/null 2>&1 & echo $!";
        $pid = shell_exec($command.$suffix);
        return intval($pid);
    }

    /**
     * checks if a process is running
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int             $pid        the process id to check
     */
    public static function check(int $pid) : bool
    {
        exec("ps ".intval($pid), $processState);
        return (count($processState) >= 2);
    }

    /**
     * kills a process
     *
     * @author          David Lienhard <github@lienhard.win>
     * @copyright       David Lienhard
     * @param           int             $pid        the process id to kill
     */
    public static function kill(int $pid) : bool
    {
        exec("kill -9 ".intval($pid), $output, $code);
        return ($code === 0);
    }
}
