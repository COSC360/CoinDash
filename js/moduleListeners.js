//.json_encode($dashboardModules[$currentCount]).

var fiatSelects = document.querySelectorAll(".fiat");
var sortSelects = document.querySelectorAll(".sort");

fiatSelects.forEach(fiatSelect => {
    fiatSelect.addEventListener('change', (e) => {
        var newFiat = this.value;
        console.log(newFiat);
    })
});

