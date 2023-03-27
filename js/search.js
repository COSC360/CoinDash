var searchBtn = document.getElementById("search");
var searchModal = document.getElementById("search-modal");

searchBtn.addEventListener("click", () => {
    if (searchModal.classList.contains("hide")){
        searchModal.classList.remove("hide");
    } else {
        searchModal.classList.add("hide");
    }
})

searchModal.addEventListener("submit", (e) => {
    e.preventDefault();
    var like = searchModal.like;
    document.location.href = `searchPage.php?like=${like}`;
})