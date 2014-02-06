<?php

namespace Model;

/**
 * Data model stores data
 * Thin model and fat controller are used which means that all business logick
 * is in controller
 */
class DataModel
{
    /**
     * @var array People collection
     */
    private $people;

    /**
     * @var array Phone numbers collection
     */
    private $phoneNumbers;

    /**
     * @var array Numbers collection
     */
    private $numbers;

    /**
     * @var array Cars collection
     */
    private $cars;

    /**
     * Constructor
     *
     * @param array $data Input data
     */
    public function __construct(array $data)
    {
        $this->setData($data);
    }

    /**
     * Get names of data fields
     *
     * @return array
     */
    public function getDataFields($a = 0)
    {
        return array('people', 'phoneNumbers', 'numbers', 'cars');
    }

    /**
     * Initialize data
     *
     * @param array $data
     */
    public function setData(array $data)
    {
        foreach ($this->getDataFields() as $field) {
            if (!isset($data[$field])) {
                throw new \Exception('Invalid input data!');
            }
            $this->$field = $data[$field];
        }
    }

    /**
     * Getter for data fields
     *
     * @param string $name Called method name
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            return call_user_method($name, $this, $args);
        }

        if ('get' == substr($name, 0, 3)) {
            $field = lcfirst(substr($name, 3));
            if (in_array($field, $this->getDataFields())) {
                return $this->$field;
            }
        }

        throw new \Exception('Unknown method ' . $name);
    }
}