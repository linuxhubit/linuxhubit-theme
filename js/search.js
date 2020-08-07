search_field = document.querySelector("header input[type='search']"),
    search_results = document.querySelector("header form > div"),
    search_result = document.querySelector("header form > div > div article"),
    search_field.addEventListener("keyup", search),
    search_keywords = "";

function search() {
    window.scrollTo(0,0);
    search_keywords = search_field.value.replace(/ /g,"+"),
        search_url = 'search?searchword=' + search_keywords + '&limit=12&areas[0]=blog',
        load(search_results, search_url, '.tm-main.tm-content.uk-width-medium-1-1'),
        search_results.style.display = "block",
        body.style.overflow = "hidden"
}

window.addEventListener('mouseup', e => {
    if(e.target.tagName != "ARTICLE" & e.target.tagName != "INPUT") {
        console.log(e.target.tagName),
            search_results.style.display = "none",
            body.style.overflow = "auto",
            search_field.value  = ""
    }
});