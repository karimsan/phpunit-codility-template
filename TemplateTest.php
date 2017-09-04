<?php

include 'vendor/autoload.php';

class TemplateTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider dataSets
     * @param mixed $testdata
     */
    function testInternalFunction(...$testdata)
    {
        $cnt = count($testdata);
        $output = $testdata[$cnt - 1];
        unset ($testdata[$cnt - 1]);
        $this->assertEquals(
            $output,
            $this->solution(...$testdata),
            "Error for input ".var_export($testdata, true)
        );
    }

    function solution($A): array
    {
        return $A;
    }


    function dataSets()
    {
        return [
            [[], []],
        ];
    }

}
