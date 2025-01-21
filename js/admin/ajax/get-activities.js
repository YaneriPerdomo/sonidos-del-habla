let $results = document.querySelector(".results");
let $load_more = document.querySelector(".load-more")

$load_more.addEventListener('click', e => {
    e.preventDefault()
    fetch("./../../php/admin/show-history-button.php", {
        method: 'POST',
        body: new URLSearchParams({
            inicio: $results.getAttribute("data-limit")
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.info(true)
            console.info(data)
            if (data.statu == true) {
                return $load_more.outerHTML = ''
            } else {
                for (let i = 0; i < 3; i++) {
                    let $div = document.createElement("div");
                    $div.innerHTML = `<div class='d-flex gap-1'>
                              <div style='flex-grow: 1;'>
                                  <p class='m-0'>${data[i].mensaje}</p>
                                  <small style='color: #6f6f6f;'>${data[i].fecha_hora}</small>
                              </div>
                              <div class='text__black'>
                                  <a href='./../../php/admin/delete-activities.php?id="${data[i].id_actividad}' class='btn-delete-activitie '>
                                      <i class='bi bi-x-lg '></i>
                                  </a>
                              </div>
                          </div>
                          <hr>`
                    $results.setAttribute('data-limit', parseInt($results.getAttribute("data-limit")) + 1)
                    $results.appendChild($div)
                }
            }

        })
        .catch(error => {
            console.error('Error:', error);
        });

})
