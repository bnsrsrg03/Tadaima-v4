<?php

namespace App\Services;

class BadWordFilter
{
    protected static $badWords = [
        // Kata kasar dasar
        'anjing', 'bangsat', 'kontol', 'memek', 'ngentot',
        'asu', 'babi', 'kampret', 'tolol', 'goblok',
        'bajingan', 'keparat', 'sialan', 'geblek', 'idiot',
        
        // Variasi ejaan
        'anjay', 'anjir', 'njing', 'anj', 'asu', 'kntl',
        'memq', 'mmk', 'ngent', 'bgo', 'goblog', 'tolol',
        
        // Kata tidak sopan
        'bodoh', 'dungu', 'berak', 'taek', 'tai', 'tahi',
        'pantek', 'puki', 'peler', 'titit',
    ];

    // Karakter yang sering digunakan untuk mengganti huruf
    protected static $characterMap = [
        'a' => ['4', '@', '&'],
        'i' => ['1', '!', '|'],
        'o' => ['0', '*', 'θ'],
        'e' => ['3', '€'],
        's' => ['$', '5'],
        't' => ['7', '+'],
    ];

    public static function filter(string $text): string 
    {
        $text = self::normalizeText($text);
        
        foreach (self::$badWords as $word) {
            // Cek kata dasar
            $pattern = '/\b' . preg_quote($word, '/') . '\b/iu';
            $text = preg_replace($pattern, str_repeat('*', strlen($word)), $text);
            
            // Cek kata dengan karakter khusus di tengah
            $pattern = '/' . self::createPatternWithSpecialChars($word) . '/iu';
            $text = preg_replace($pattern, str_repeat('*', strlen($word)), $text);
        }
        
        return $text;
    }

    public static function hasBadWords(string $text): bool
    {
        $text = self::normalizeText($text);
        
        foreach (self::$badWords as $word) {
            // Cek kata dasar
            if (preg_match('/\b' . preg_quote($word, '/') . '\b/iu', $text)) {
                return true;
            }
            
            // Cek kata dengan karakter khusus
            if (preg_match('/' . self::createPatternWithSpecialChars($word) . '/iu', $text)) {
                return true;
            }
        }
        
        return false;
    }

    private static function normalizeText(string $text): string
    {
        $text = strtolower($text);
        $text = preg_replace('/\s+/', ' ', $text); // Menghapus spasi berlebih
        
        // Normalisasi karakter pengganti
        foreach (self::$characterMap as $letter => $replacements) {
            foreach ($replacements as $replacement) {
                $text = str_replace($replacement, $letter, $text);
            }
        }
        
        return trim($text);
    }

    private static function createPatternWithSpecialChars(string $word): string
    {
        $pattern = '';
        $chars = str_split($word);
        
        foreach ($chars as $char) {
            $pattern .= preg_quote($char, '/') . '[^a-zA-Z0-9]*';
        }
        
        return $pattern;
    }
}