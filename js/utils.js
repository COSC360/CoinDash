function getURLParams(){

    var address = window.location.search
    // Returns a URLSearchParams object instance
    var parameterList = new URLSearchParams(address)
    // Created a map which holds key value pairs
    var map = new Map()
    // Storing every key value pair in the map
    parameterList.forEach((value, key) => {
        map.set(key, value)
    })
    
    return map
}

var fiatLabels = ["US Dollar", "Canadian Dollar", "Euro", "Philippine Peso", "Japanese Yen"];
var fiats = ["usd", "cad", "eur", "php", "jpy"];

var sortLabels = ["Views: High to Low", "Views: Low to High", "24H: High To Low", "24H: Low To High", 
                "7D: High To Low", "7D: Low To High", "14D: High To Low", "14D: Low To High", 
                "30D: High To Low", "30D: Low To High", "60D: High To Low", "60D: Low To High",
                "200D: High To Low", "200D: Low To High", "1YR: High To Low", "1YR: Low To High"];
var sortValues = ["views DESC", "views", "price_change_24h DESC", "price_change_24h", 
                "price_change_7d DESC", "price_change_7d", "price_change_14d DESC", "price_change_14d",
                "price_change_30d DESC", "price_change_30d", "price_change_60d DESC", "price_change_60d",
                "price_change_200d DESC", "price_change_200d", "price_change_1yr DESC", "price_change_1yr"]; 

export { getURLParams, fiatLabels, fiats, sortLabels, sortValues};