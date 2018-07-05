<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Zaldivar
 * Date: 5/7/18
 * Time: 19:27
 */

namespace App\Utils;


class Asciify
{
    private $string;

    /**
     * Asciify constructor.
     *
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
    }

    /**
     * @return array
     */
    public function splitStringToAscii(): array
    {
        $splitWord = str_split($this->string);
        $result    = [];

        foreach ($splitWord as $key => $letter) {
            $result[] = ['letter' => $letter, 'ascii' => ord($letter)];
        }

        return $result;
    }

}