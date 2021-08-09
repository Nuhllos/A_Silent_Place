//TMDB

const API_KEY = "api_key=8a1743415bc06505e89e245a2d0cb38f&language=pt-BR";
const BASE_URL = "https://api.themoviedb.org/3";
const API_URL = BASE_URL + "/discover/movie?sort_by=popularity.desc&" + API_KEY;
const IMG_URL = "https://image.tmdb.org/t/p/w500";
const searchUrl = BASE_URL + "/search/movie?" + API_KEY;

const genres = [{"id":28,"name":"Ação"},{"id":12,"name":"Aventura"},{"id":16,"name":"Animação"},{"id":35,"name":"Comédia"},{"id":80,"name":"Crime"},{"id":99,"name":"Documentário"},{"id":18,"name":"Drama"},{"id":10751,"name":"Família"},{"id":14,"name":"Fantasia"},{"id":36,"name":"História"},{"id":27,"name":"Terror"},{"id":10402,"name":"Música"},{"id":9648,"name":"Mistério"},{"id":10749,"name":"Romance"},{"id":878,"name":"Ficção científica"},{"id":10770,"name":"Cinema TV"},{"id":53,"name":"Thriller"},{"id":10752,"name":"Guerra"},{"id":37,"name":"Faroeste"}];

const tagsEl = document.querySelector("#tags");
const tagsEl2 = document.querySelector("#tags2");
const main = document.querySelector("#main");
const form = document.querySelector("#form");
const search = document.querySelector("#search");

const prev = document.querySelector("#prev");
const next = document.querySelector("#next");
const current = document.querySelector("#current");

let selectedGenre = [];

let currentPage = 1;
let nextPage = 2;
let prevPage = 3
let lastUrl = "";
let totalPages = 100;

setGenre();

function setGenre() {
    tagsEl.innerHTML = "";
    genres.forEach(genre => {
        const t = document.createElement("button");
        t.classList.add("btn", "btn-outline-dark", "m-1", "mx-1", "py-1", "px-3", "tag", "genreBtn");
        t.id=genre.id;
        t.innerText = genre.name;
        t.addEventListener("click", () => {
            if (selectedGenre.length == 0) {
                selectedGenre.push(genre.id);
            } else {
                if (selectedGenre.includes(genre.id)) {
                    selectedGenre.forEach((id, idx) => {
                        if (id == genre.id) {
                            selectedGenre.splice(idx, 1);
                        }
                    })
                } else {
                    selectedGenre.push(genre.id);
                }
            }
            getMovies(API_URL + "&with_genres=" + encodeURI(selectedGenre.join(",")));

            highlightSelection();
        });
        tagsEl.append(t);
    });
}

function highlightSelection() {
    const tags = document.querySelectorAll(".tag");
    tags.forEach(tag => {
        tag.classList.remove("highlited");
    });

    clearBtn();

    if (selectedGenre.length != 0) {
        selectedGenre.forEach(id => {
            const highlightedTag = document.getElementById(id);
            highlightedTag.classList.add("highlited");
        });
    }
}

function clearBtn() {
    let clearBtn = document.querySelector("#clear");
    if (clearBtn) {

    } else {
        let clear = document.createElement("button");
        clear.classList.add("btn", "btn-outline-danger", "m-1", "mx-1", "py-1", "px-3", "tag", "genreBtn");
        clear.id = "clear";
        clear.innerText = "Limpar";
        clear.addEventListener("click", () => {
            selectedGenre = [];
            setGenre();
            getMovies(API_URL);
            clear.remove();
        });
        tagsEl2.append(clear);
    }
}

getMovies(API_URL);

function getMovies(url) {
    lastUrl = url;

    fetch(url).then(res => res.json()).then(data => {
        if (data.results.length !== 0) {
            showMovies(data.results);
            currentPage = data.page;
            nextPage = currentPage + 1;
            prevPage = currentPage - 1;
            totalPages = data.total_pages;

            current.innerText = currentPage;

            if (currentPage <= 1) {
                prev.classList.add("disabled");
                next.classList.remove("disabled");
            } else if (currentPage >= totalPages) {
                prev.classList.remove("disabled");
                next.classList.add("disabled");
            } else {
                prev.classList.remove("disabled");
                next.classList.remove("disabled");
            }
        } else {
            main.innerHTML = `<h4 class="p-3 text-center">Nenhum filme encontrado</h4>`;
        }
    });
}

function showMovies(data) {
    main.innerHTML = "";

    data.forEach(movie => {
        const {title, poster_path, vote_average, overview} = movie;
        const movieEl = document.createElement("div");
        movieEl.classList.add("col-md-3", "mb-3");
        movieEl.innerHTML = `
                <div class="movie">
                    <img src="${poster_path? IMG_URL + poster_path: ""}" alt="${title}" class="img-fluid">
                    <div class="movie-info">
                        <h4 class="mt-1">${title}</h4>
                        <div class="span">
                            <span class="${getColor(vote_average)}">${vote_average}</span>
                        </div>
                    </div>
                    <div class="overview">
                        ${overview}
                    </div>
                </div>
            `
        main.appendChild(movieEl);
    })
}

function getColor(vote) {
    if (vote >= 8) {
        return "green";
    } else if (vote >= 5) {
        return "orange";
    } else {
        return "red";
    }
}

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const searchTerm = search.value;

    selectedGenre = [];
    highlightSelection();

    if (searchTerm) {
        getMovies(searchUrl + "&query=" + searchTerm);
    } else {
        getMovies(API_URL);
    }
})

prev.addEventListener("click", () => {
    if (prevPage > 0) {
        pageCall(prevPage);
        main.scrollIntoView({behavior: "smooth"});
    }
});

next.addEventListener("click", () => {
    if (nextPage <= totalPages) {
        pageCall(nextPage);
        main.scrollIntoView({behavior: "smooth"});
    }
});

function pageCall(page) {
    let urlSplit = lastUrl.split("?");
    let queryParams = urlSplit[1].split("&");
    let key = queryParams[queryParams.length - 1].split("=");
    if (key[0] != "page") {
        let url = lastUrl + "&page=" + page;
        getMovies(url);
    } else {
        key[1] = page.toString();
        let a = key.join('=');
        queryParams[queryParams.length - 1] = a;
        let b = queryParams.join("&");
        let url = urlSplit[0] + "?" + b
        getMovies(url);
    }
}