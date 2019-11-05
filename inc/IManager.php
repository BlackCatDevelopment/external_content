<?php

namespace CAT\Addon\external_content;

interface IManager
{
    public function getdata(array $section) : array;
    public function savedata(array $section, array $data);
}