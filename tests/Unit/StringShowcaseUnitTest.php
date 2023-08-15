<?php

namespace MyNameNull\StrShowcase\Tests\Unit;

use MyNameNull\Showcase\Str\ShowcaseString;
use PHPUnit\Framework\TestCase;

class StringShowcaseUnitTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_string_brackets_are_correctly_closed_function(): void
    {
        $this->assertTrue(ShowcaseString::areBracketsClosedCorrectly('((a+b)*[c-d])'));
        $this->assertFalse(ShowcaseString::areBracketsClosedCorrectly('{(a+b)*(c-d])}'));

        $this->assertTrue(ShowcaseString::areBracketsClosedCorrectly('([]){[]}'));
        $this->assertFalse(ShowcaseString::areBracketsClosedCorrectly('([)]{[]}'));
    }

    public function test_string_reversed(): void
    {
        $str = 'Hello World';
        $reversed = 'dlroW olleH';

        $this->assertEquals($reversed, ShowcaseString::reverse($str));
    }

    public function test_string_vowels(){
        $str = 'Hello World';

        $this->assertEquals(['e', 'o', 'o'], ShowcaseString::extractVowels($str));
    }

    public function test_string_count_of_vowels(){
        $str = 'Hello World';

        $this->assertEquals(3, ShowcaseString::vowelCount($str));
    }

    public function test_string_is_palindrome(){
        $str = 'poop';

        $this->assertTrue(ShowcaseString::isPalindrome($str));
    }

    public function test_string_has_capitalized_words(){
        $str = 'hello world';

        $this->assertEquals('Hello World', ShowcaseString::capitalizeWords($str));
    }

    public function test_string_has_no_duplicate_characters(){
        $str = 'hheelloo wwoorrlldd';

        $this->assertEquals('helo wrd', ShowcaseString::removeDuplicateCharacters($str));
    }

    public function test_string(){
        
    }

}
