/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $dummyHead = new ListNode(0); // Dummy head for the resulting linked list
        $current = $dummyHead; // Pointer to construct the new list
        $carry = 0; // Variable to store carry

        // Traverse both lists until both are null
        while ($l1 !== null || $l2 !== null || $carry > 0) {
            $sum = $carry; // Start with the carry from the previous addition

            // Add the value of the first linked list node if available
            if ($l1 !== null) {
                $sum += $l1->val;
                $l1 = $l1->next; // Move to the next node
            }

            // Add the value of the second linked list node if available
            if ($l2 !== null) {
                $sum += $l2->val;
                $l2 = $l2->next; // Move to the next node
            }

            // Update carry for the next addition
            $carry = intdiv($sum, 10); // Calculate the new carry
            $current->next = new ListNode($sum % 10); // Create a new node with the digit value
            $current = $current->next; // Move the pointer forward
        }

        // Return the next of dummy head as it was initialized with a zero node
        return $dummyHead->next;
    }
}

// Example usage
// Creating the linked lists for testing: l1 = [2,4,3] represents 342
$l1 = new ListNode(2, new ListNode(4, new ListNode(3)));

// Creating the linked lists for testing: l2 = [5,6,4] represents 465
$l2 = new ListNode(5, new ListNode(6, new ListNode(4)));

// Create a Solution object
$solution = new Solution();
$result = $solution->addTwoNumbers($l1, $l2);

// Print result
while ($result !== null) {
    echo $result->val . " ";
    $result = $result->next;
}
