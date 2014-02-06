<?php

namespace Helper;

/**
 * Class compares two operands using given comparison operator
 *
 * @todo Add more comparison operators
 */
class Comparator
{
    /**
     * @var array Map of operators to method name
     */
    private $map = array(
        '>' => 'g',
        '>=' => 'ge',
        //'<' => 'l',
        //'<=' => 'le',
        //'=' => 'e',
        //'==' => 'e',
    );

    /**
     * Get comaprison result
     *
     * @param mixed  $op1      First operand
     * @param mixed  $op2      Second operand
     * @param string $operator Operator
     */
    public function getResult($op1, $op2, $operator)
    {
        if (!array_key_exists($operator, $this->map)) {
            throw new Exception('Unknown comparison operator');
        }

        $method = 'is' . ucfirst($this->map[$operator]);

        return $this->$method($op1, $op2);
    }

    /**
     * Defines whether operand one is greater than operand two
     *
     * @param mixed $op1 First operand
     * @param mixed $op2 Second operand
     * @return boolean
     */
    private function isG($op1, $op2)
    {
        return $op1 > $op2;
    }

    /**
     * Defines whether operand one is greater than operand two
     *
     * @param mixed $op1 First operand
     * @param mixed $op2 Second operand
     * @return boolean
     */
    private function isGe($op1, $op2)
    {
        return $op1 >= $op2;
    }
}