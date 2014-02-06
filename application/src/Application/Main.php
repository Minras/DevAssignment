<?php

namespace Application;

use Helper;

class Main
{
    /**
     * @var DataModel
     */
    private $model;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->model = new \Model\DataModel($data);
    }

    /**
     * Return filtered list of people
     *
     * @param string $attr  Person attribute name
     * @param string $value Attribute value
     * @return array
     */
    public function getPeople($attr, $value)
    {
        return array_filter(
            $this->model->getPeople(),
            function($person) use ($attr, $value) {
                return isset($person[$attr]) && $person[$attr] == $value;
            }
        );
    }

    /**
     * Return filtered list of people
     *
     * @param string $attr  Person attribute name
     * @param string $value Attribute value
     * @return array
     */
    public function getCars($value)
    {
        $result = array();
        foreach ($this->model->getCars()['brands'] as $brand => $data) {
            $result = array_merge(
                $result,
                $this->filterModels($brand, $data['models'], $value)
            );
        }

        return $result;
    }

    /**
     * Filter given list of cars by a searched value
     *
     * @param string $brand  Brand name
     * @param array  $models List of models
     * @param string $value  Searched value
     * @return array
     */
    private function filterModels($brand, $models, $value)
    {
        return array_reduce(
            $models,
            function (&$result, $model) use ($brand, $value) {
                if (FALSE !== strpos($model, $value)) {
                    $result[] = sprintf('%s %s', $brand, $model);
                }
                return $result;
            },
            array()
        );
    }

    /**
     * Get filtered list of phones. Value accepts wildcards (*)
     *
     * @param string $filter
     * @return array
     */
    public function getPhones($filter)
    {
        $filter = sprintf(
            '/%s%s%s/',
            '*' != substr($filter, 0, 1) ? '^' : '',
            str_replace('*', '(\d)*', $filter),
            '*' != substr($filter, -1) ? '$' : ''
        );

        return array_filter(
            $this->model->getPhoneNumbers(),
            function ($number) use ($filter) {
                $number = preg_replace('/\D/', '', $number);
                return (boolean) preg_match($filter, $number);
            }
        );
    }

    /**
     * Get filtered list of numbers. Different comparison operators
     * to be accepted
     *
     * @param mixed  $number   Comparison number
     * @param string $operator Comaprison operator
     * @return array
     */
    public function getNumbers($number, $operator)
    {
        $comparator = new Helper\Comparator();

        return array_filter(
            $this->model->getNumbers(),
            function ($item) use ($operator, $number, $comparator) {
                return $comparator->getResult($item, $number, $operator);
            }
        );
    }
}
