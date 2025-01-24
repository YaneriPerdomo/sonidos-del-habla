let $search_data_input = document.querySelector("#search-data-input") ;
let $show_all_search_data = document.querySelector("[name='on-show-all']");
let $form_check = document.querySelector('.form-check-input');
$search_data_input.addEventListener("input", e => {
   console.info($form_check.checked)
   console.info($show_all_search_data.checked);
    fetch(`./../../php/admin/${e.target.getAttribute('data-php')}.php`, {
        method: "POST",
        body: new URLSearchParams({
            search: e.target.value,
            show_all: $show_all_search_data.checked,
        }),
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Network response was not ok");
            }
            return response.text();
        })
        .then((data) => {
            document.querySelector('.results-data').innerHTML = data;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
})