require('./bootstrap');

const app = document.querySelector('#js');

const renderUl = (items) => {
    const list = Object.keys(items).map(function(key, index) {
        return `<li class="list-group-item" id="${key}">${key}: ${items[key]} <a href='#' class='remove btn btn-primary'>delete</a></li>`
    });
    return "<ul class='list-group'>" + list.join('') + "</ul>";
}

let items = {};
fetch('api/redis')
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        items = data;
        app.innerHTML = renderUl(items);
    })
    .then(() => {
        document.querySelectorAll('.remove').forEach((item) => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const a = e.target;
                const li = a.parentElement;
                const key = li.id;
                fetch(`api/redis/${key}`, { method: 'DELETE' })
                    .then((response) => {
                        return response.json();
                    })
                    .then(() => {
                        li.remove();
                    })
                    .catch((error) => {
                        console.error('Ошибка:', error);
                    })
            })
        });
    })
