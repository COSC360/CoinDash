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

export { getURLParams };