<?php

interface ICrud {
    public function create($object);
    public function update($object);
    public function delete($object);
}
