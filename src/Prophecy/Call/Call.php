<?php

namespace Prophecy\Call;

/*
 * This file is part of the Prophecy.
 * (c) Konstantin Kudryashov <ever.zet@gmail.com>
 *     Marcello Duarte <marcello.duarte@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Call object.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class Call
{
    private $methodName;
    private $arguments;
    private $returnValue;
    private $file;
    private $line;

    /**
     * Initializes call.
     *
     * @param string      $methodName
     * @param array       $arguments
     * @param mixed       $returnValue
     * @param null|string $file
     * @param null|int    $line
     */
    public function __construct($methodName, array $arguments, $returnValue, $file, $line)
    {
        $this->methodName  = $methodName;
        $this->arguments   = $arguments;
        $this->returnValue = $returnValue;

        if ($file) {
            $this->file = $file;
            $this->line = intval($line);
        }
    }

    /**
     * Returns called method name.
     *
     * @return string
     */
    public function getMethodName()
    {
        return $this->methodName;
    }

    /**
     * Returns called method arguments.
     *
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Returns called method return value.
     *
     * @return null|mixed
     */
    public function getReturnValue()
    {
        return $this->returnValue;
    }

    /**
     * Returns callee filename.
     *
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns callee line number.
     *
     * @return int
     */
    public function getLine()
    {
        return $this->line;
    }

    /**
     * Returns short notation for callee place.
     *
     * @return string
     */
    public function getCallPlace()
    {
        if (null === $this->file) {
            return 'unknown';
        }

        return sprintf('%s:%d', $this->file, $this->line);
    }
}
