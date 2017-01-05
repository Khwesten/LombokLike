<?php

namespace LombokLike\Exception;

/**
 * Created by IntelliJ IDEA.
 * User: k-heiner@hotmail.com
 * Date: 04/01/2017
 * Time: 22:22
 */
interface IException
{
    public function getMessage();

    public function getCode();

    public function getFile();

    public function getLine();

    public function getTrace();

    public function getTraceAsString();

    public function __toString();

    public function __construct($message = null, $code = 0);
}