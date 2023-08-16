<?php

namespace MyNameNull\Showcase\Str;


/**
 * A class with functions regarding possible PHP job interview questions regarding string manipulation
 *
 * @author mynamenull <hi@null.tf>
 */
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
     * Checks whether the $str is an anagram of $of
     *
     * @param string $str - the string to check against $of
     * $param string $of - the string to check against $str
     *
     * @return bool
     */
    public static function isAnagram(string $str, string $of): bool
    {
        return count(array_diff_assoc(str_split($str), str_split($str))) === 0;
    }

    /**
     * Get an assoc array of words with the frequency used as value
     *
     * @param string $paragraph - the string to check the word frequency
     *
     * @return array - assoc array of words with the frequency count
     */
    public static function getWordFrequency(string $paragraph): array
    {
        $stack = [];
        $words = explode(' ', $paragraph);

        for($i = 0; $i < count($words); $i++) {
            // make sure the string is lowercase to match same words
            $word = strtolower($words[$i]);

            // remove redundant characters
            $word = preg_replace('/[^a-zA-Z0-9]/i', '', $word);

            if(array_key_exists($word, $stack)) {
                $stack[$word]++;
            } else {
                $stack[$word] = 1;
            }
        }

        return $stack;
    }

    /**
     * Truncate a given string to a specific length ending with '...'
     *
     * @param string $str - the string to truncate
     * @param int $length - the length to be truncated to
     *
     * @return string - the truncated string
     */
    public static function truncate(string $str, int $length = 12): string
    {
        $l = strlen($str);

        // If the $str is less then $length return the $str directly
        if($l <= $length) {
            return $str;
        }

        return substr($str, 0, $length) . "...";
    }

    /**
     * Compresses a string with character frequency
     *
     * @param string $str - the string to compress
     *
     * @return string - the compressed string
     */
    public static function compress(string $str): string
    {
        $stack = [];
        // Split all characters into an array
        $spl = str_split($str);

        // Loop through each character and store it in stack, if it already exists add to the count
        for($i = 0; $i < strlen($str); $i++) {
            $char = $spl[$i];

            if(array_key_exists($char, $stack)) {
                $stack[$char]++;
            } else {
                $stack[$char] = 1;
            }
        }

        // Construct the string with the character and the frequency
        $result = '';
        foreach($stack as $ch => $freq) {
            $result .= $ch . $freq;
        }

        // If the compressed string is bigger then the original stirng, return the original string
        if(strlen($result) >= strlen($str)) {
            return $str;
        }

        return $result;
    }

    /**
     * Replaces $search in the source string with substr
     *
     * @param string $str - the string where the replacement is taking place
     * @param string $search - the string to search for in $str
     * @param string $replacement - the string to replace $search with
     *
     * @return string - the replaced string, if no search is found original will be returned
     */
    public static function replaceSubstring(string $str, string $search, string $replacement): string
    {
        // Get the position of the $search
        $pos = strpos($str, $search);

        // If the $search is not found return the original string
        if($pos === false) {
            return $str;
        }

        // Get the parts before and after the substring
        $pf = substr($str, 0, $pos);
        $af = substr($str, $pos + strlen($search));

        // Construct the string with the replacement
        return $pf . $replacement . $af;
    }

}