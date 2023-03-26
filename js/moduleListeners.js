//.json_encode($dashboardModules[$currentCount]).

var fiatSelects = document.querySelectorAll(".fiat");
var sortSelects = document.querySelectorAll(".sort");
console.log(fiatSelects);

fiatSelects.forEach(fiatSelect => {
    fiatSelect.addEventListener('change', (e) => {
        var newFiat = fiatSelect.value;
        console.log(newFiat);
    })
});

