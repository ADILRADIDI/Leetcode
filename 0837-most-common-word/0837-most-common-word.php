class Solution {

    /**
     * @param String $paragraph
     * @param String[] $banned
     * @return String
     */
    function mostCommonWord($paragraph, $banned) {
        // Convert the paragraph to lowercase
        $paragraph = strtolower($paragraph);
        
        // Remove punctuation using a regex
        $paragraph = preg_replace('/[^\w\s]/', ' ', $paragraph);
        
        // Split the paragraph into words
        $words = explode(' ', $paragraph);
        
        // Create a set for banned words for fast lookup
        $bannedSet = array_flip($banned);
        
        // Count occurrences of each word
        $wordCount = [];
        
        foreach ($words as $word) {
            // Ignore empty strings
            if (trim($word) == '') {
                continue;
            }
            // If the word is not banned, count it
            if (!isset($bannedSet[$word])) {
                if (!isset($wordCount[$word])) {
                    $wordCount[$word] = 0;
                }
                $wordCount[$word]++;
            }
        }
        
        // Find the most common word
        $mostCommon = '';
        $maxCount = 0;
        
        foreach ($wordCount as $word => $count) {
            if ($count > $maxCount) {
                $mostCommon = $word;
                $maxCount = $count;
            }
        }
        
        return $mostCommon;
    }
}

// Create an instance of the Solution class
$solution = new Solution();
$paragraph = 'hi im ayoub and im adil im software enginner enginner php ayoub php js';
$banned = ['ayoub'];

// Call the function and print the result
echo $solution->mostCommonWord($paragraph, $banned); // Output: "im"
