<?php

namespace MyNameNull\Showcase\Str;


class ShowcaseString {

    /**
     * Check if a opening bracket matches closing bracket
     *
     * @param $open - Opening bracket
     * @param $close - Closing bracket
     * 
     * @return bool
     */
    public static function doBracketsMatch($open, $close): bool
    {
        return ($open === '(' && $close === ')')
            || ($open === '[' && $close === ']')
            || ($open === '{' && $close === '}');
    }

    /**
     * Check if brackets are closed correctly
     *
     * @param $str - The input string to check whether brackets are closed correctly
     * 
     * @return bool
     */
    public static function areBracketsClosedCorrectly($str): bool
    {
        $stack = []; // Stores opening brackets

        // Loop through each character in the string
        for($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            // If the character is an opening bracker, store it in the stack
            if(in_array($char, ['(', '[', '{'])) {
                $stack[] = $char;
            }

            // If the character is a closing bracket, check if it matches the top of the stack
            elseif (in_array($char, [')', ']', '}'])) {
                if(empty($stack)) {
                    return false;
                }

                // If the stack is empty or the top of the stack doesn't match the closing bracker, return false
                if(!static::doBracketsMatch(array_pop($stack), $char)) {
                    return false;
                }
            }
        }

        // If stack is empty, all brackets are closed correctly
        return empty($stack);
    }

    /**
     * Returns a string reversed
     *
     * @param $str - the string being reversed
     * 
     * @return string - the reversed string
     */
    public static function reverse(string $str): string
    {
        return implode('', array_reverse(str_split($str)));
    }

    /**
     * Get a list with possible vowels
     *
     * @param bool $includeY - Define whether to include the letter Y to the vowel list
     * 
     * @return array - a list with vowels
     */
    public static function getVowelList(bool $includeY = false): array
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];

        if($includeY) {
            $vowels[] = 'y';
        }

        return $vowels;
    }

    /**
     * Get all vowels from a string
     * 
     * @param string $str - The input string where vowels are being extracted from
     * @param bool $includeY - Whether to include the letter Y to the vowels list
     * 
     * @return array - a list with all vowels in $str
     */
    public static function extractVowels(string $str, bool $includeY = false): array
    {
        $vowelList = self::getVowelList($includeY);
        $stack = [];

        for($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            if (in_array($char, $vowelList)) {
                $stack[] = $char;
            }
        }

        return $stack;
    }

    /**
     * Get the vowel count from a string
     * 
     * @param string $str - The input string where vowels are being counted from
     * @param bool $includeY - Whether to include the letter Y to the vowels list
     * 
     * @return int - The count from all vowels in $str
     */
    public static function vowelCount(string $str, bool $includeY = false): int
    {
        return count(self::extractVowels($str, $includeY));
    }

    /**
     * Checks whether a string is a palindrome
     *
     * @param string $str - The input string to check for palindrome
     * 
     * @return bool - returns true if the $str is a palindrome
     */
    public static function isPalindrome(string $str): bool
    {
        return $str === self::reverse($str);
    }

    /**
     * Capitalizes all words from a string
     *
     * @param string $str - The string to be capitalized
     * 
     * @return string - The string with capitalized words
     */
    public static function capitalizeWords(string $str): string
    {
        // Capital words will be stored here
        $stack = [];
        // Split the string on space
        $words = explode(' ', $str); 

        for($i = 0; $i < count($words); $i++) {
            $word = $words[$i];

            // Get the first letter from the word
            $firstLetter = substr($word, 0, 1);
            // Make the first letter capital
            $capitalLetter = ucfirst($firstLetter);

            // Prepend the capital letter to the word without the first letter
            $stack[] = $capitalLetter . substr($word, 1);
        }

        // Glue the words together with a space
        return implode(' ', $stack); 
    }

    /**
     * Removes duplicate characters from a string
     *
     * @param string $str - the input string where duplicate characters will be removed
     *
     * @return string - The $str without duplicate characters
     */
    public static function removeDuplicateCharacters(string $str): string
    {
        $stack = [];

        for($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];

            // Skip id character is already in the $stack
            if(in_array($char, $stack)) {
                continue; 
            }

            $stack[] = $char;
        }

        // Glue together the array without duplicate characters
        return implode('', $stack);
    }
    
    /**
     * @WIP
     *
     * - add replace substring
     * - add string compression
     * - add anagram check
     * - add word frequency
     * - add truncate string
     *
     * - add tests / make sure tests succeed
     */

}