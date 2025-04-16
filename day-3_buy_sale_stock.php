<?php
/**
 * 121. Best Time to Buy and Sell Stock
 * https://leetcode.com/problems/best-time-to-buy-and-sell-stock/
 * You are given an array prices where prices[i] is the price of a given stock on the ith day.
 * You want to maximize your profit by choosing a single day to buy one stock and choosing a different day in the future to sell that stock.
 * Return the maximum profit you can achieve from this transaction. If you cannot achieve any profit, return 0.
 * 
 * Example 1:
 * Input: prices = [7,1,5,3,6,4]
 * Output: 5
 * Explanation: Buy on day 2 (price = 1) and sell on day 5 (price = 6), profit = 6-1 = 5.
 * Note that buying on day 2 and selling on day 1 is not allowed because you must buy before you sell.
 * 
 * Example 2:
 * Input: prices = [7,6,4,3,1]
 * Output: 0
 * Explanation: In this case, no transactions are done and the max profit = 0.
 * 
 * Example 3:
 * Input: prices = [2,4,1]
 * Output: 2
 * Explanation: Buy on day 1 (price = 2) and sell on day 2 (price = 4), profit = 4-2 = 2.
 * Note that buying on day 2 and selling on day 1 is not allowed because you must buy before you sell.
 * Constraints:
 * 1 <= prices.length <= 10^5
 * 0 <= prices[i] <= 10^4
 * Approach:
 * 1. Initialize minPrice to the maximum possible integer value.
 * 2. Initialize maxProfit to 0.
 * 3. Iterate through the prices array:
 * a. If the current price is less than minPrice, update minPrice.
 **/
function maxProfit($prices) {
    $minPrice = PHP_INT_MAX;
    $maxProfit = 0;

    foreach ($prices as $price) {

        if ($price < $minPrice) { // Buy
            $minPrice = $price;
        } else { // Sell
            $maxProfit = max($maxProfit, $price - $minPrice);
        }
    }

    return $maxProfit;
}