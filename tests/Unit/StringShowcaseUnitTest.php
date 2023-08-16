<?php

namespace MyNameNull\Showcase\Str\Tests\Unit;

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

    public function test_string_vowels(): void
    {
        $str = 'Hello World';

        $this->assertEquals(['e', 'o', 'o'], ShowcaseString::extractVowels($str));
    }

    public function test_string_count_of_vowels(): void
    {
        $str = 'Hello World';

        $this->assertEquals(3, ShowcaseString::vowelCount($str));
    }

    public function test_string_is_palindrome(){
        $str = 'poop';

        $this->assertTrue(ShowcaseString::isPalindrome($str));
    }

    public function test_string_has_capitalized_words(): void
    {
        $str = 'hello world';

        $this->assertEquals('Hello World', ShowcaseString::capitalizeWords($str));
    }

    public function test_string_has_no_duplicate_characters(): void
    {
        $str = 'hheelloo wwoorrlldd';

        $this->assertEquals('helo wrd', ShowcaseString::removeDuplicateCharacters($str));
    }

    public function test_string_is_anagram(): void
    {
        $str = 'silent';
        $of = 'listen';
        
        $this->assertTrue(ShowcaseString::isAnagram($str, $of));
    }

    public function test_string_word_frequency(){
        $paragraph = 'My tests are awesome. Null is awesome, woop woop';

        $this->assertEquals([
            'my' => 1,
            'tests' => 1,
            'are' => 1,
            'awesome' => 2,
            'null' => 1,
            'is' => 1,
            'woop' => 2
        ], ShowcaseString::getWordFrequency($paragraph));
    }

    public function test_string_truncate(){
        $str = 'My awesome cool string that has to be truncated';
        $this->assertEquals('My awesome c...', ShowcaseString::truncate($str));

        $str = 'This is awesome.';
        $this->assertEquals($str, ShowcaseString::truncate($str, 50));
    }

    public function test_string_compression(){
        $this->assertEquals('a4b1c5d4', ShowcaseString::compress('aaaabcccccdddd'));
        $this->assertEquals('abc', ShowcaseString::compress('abc'));
    }

    public function test_string_replace_substring(){
        $str = 'Hello, world! How are you doing?';

        $this->assertEquals('Hello, universe! How are you doing?', ShowcaseString::replaceSubstring($str, 'world', 'universe'));
        $this->assertEquals('Hello', ShowcaseString::replaceSubstring('Hello', 'notfound', 'xxx'));
    }

}
