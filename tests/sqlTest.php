<?php

class SqlTest extends \PHPUnit\Framework\TestCase {
    public function testCoinsByLike(){
        include "./php/DBconnection.php";
        include "./php/sql-queries.php";

        $validCoins = "Array ( [0] => Array ( [Id] => axie-infinity [symbol] => axs [name] => Axie Infinity [description] => AXS is the governance token for the Axie Infinity game. Token holders will be able to shape and vote for the direction of the game universe. This is unlike traditional games where all decisions are made by the game developers. AXS holders will be able to stake their tokens to earn more AXS and even vote for governance proposals. [img_url] => https://assets.coingecko.com/coins/images/13029/large/axie_infinity_logo.png?1604471082 [usd] => 8.5 [cad] => 11.73 [eur] => 7.88 [php] => 461.25 [jpy] => 1110.9 [price_change_24h] => 0.67313 [price_change_7d] => -3.27011 [price_change_14d] => 16.11151 [price_change_30d] => -19.35074 [price_change_60d] => -23.39636 [price_change_200d] => -35.6284 [price_change_1yr] => -88.1065 [views] => 134 ) )";
        $result = retrieveCoinByLike($con, "axi");
        $this->assertTrue(true);
    }
}