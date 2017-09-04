<?php

include 'vendor/autoload.php';

class DemoTest extends \PHPUnit\Framework\TestCase
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

    function solution($A, $K): array
    {
        $N = count($A);

        if ($N == 0) {
            return [];
        }

        $K = $K % $N;
        for ($i = 1; $i <= $K; $i++) {
            $el = array_pop($A);
            array_unshift($A, $el);
        }

        return $A;
    }


    function dataSets()
    {
        return [
            // [$A, $K, expected result]
            [[3, 8, 9, 7, 6], 3, [9, 7, 6, 3, 8]],
            [[1, 2], 4, [1, 2]],
            [[], 3, []],
        ];
    }

}
