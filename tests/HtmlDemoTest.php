<?php
/**
 * Created by PhpStorm.
 * User: xialintai
 * Date: 2016/12/29
 * Time: 9:45.
 */

namespace xltxlm\template\tests;

use PHPUnit\Framework\TestCase;
use xltxlm\template\tests\Resource\HtmlTemplate\HtmlDemo;

class HtmlDemoTest extends TestCase
{
    public function test1()
    {
        $this->expectOutputRegex("/name:/");
        (new HtmlDemo())();
    }
}
