function getURLParams(){
    console.log("ASD");
    address = window.location.search
    // Returns a URLSearchParams object instance
    parameterList = new URLSearchParams(address)
    // Created a map which holds key value pairs
    let map = new Map()
    // Storing every key value pair in the map
    parameterList.forEach((value, key) => {
        map.set(key, value)
    })
    
    return map
}

export { getURLParams };