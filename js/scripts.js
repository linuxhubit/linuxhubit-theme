var body = document.getElementsByTagName("body")[0];

/* load data from other page */
function load(dom, url, source_dom=false) {
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            content = xmlHttp.responseText;
            if(source_dom) {
                try {
                    document.getElementById("content_process").remove();
                } catch {
                    console.debug("No content process found.")
                }
                content_process = document.createElement("div"),
                    content_process.innerHTML = content,
                    content_process.id = "content_process",
                    content_process.style.display = "none",
                    body.appendChild(content_process),
                    content = document.querySelector("#content_process " + source_dom).outerHTML
            }
            dom.innerHTML = content;
        }
    };
    start = new Date().getTime();
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}