<?php

abstract class Model
{
    protected function hydrate(array $data)
    {
        foreach ($data as $attribute => $value) {
            $method = "set" . strtoupper($attribute);
            if(is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }

}