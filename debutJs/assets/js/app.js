// j'ai po compris les regexp ...
// const regex = new RegExp("^[0-9][A-Za-z0-9 -]*$");
// const input = document.querySelector('input')

const btnSubmit = document.querySelector("#submit")

const prixArticles = document.querySelector("#prix")
const nbArticles = document.querySelector("#nbArticles")

const total = document.querySelector("#total")
const transport = document.querySelector(".js-transport")


btnSubmit.addEventListener("click", () => {
    let parsePrix = parseInt(prixArticles.value, 10)
    let parseNbArticles = parseInt(nbArticles.value, 10)
    let parseTotal = parseInt(total.textContent, 10)

    total.textContent = parsePrix * parseNbArticles
    console.log("prix : " + parsePrix, "et nb articles : " + parseNbArticles);

    if (parseTotal >= 100 && parseTotal < 200) {
        transport.textContent = "5"
    } else if (parseTotal >= 200) {
        transport.textContent = "0"
    } else if (parseTotal < 100) {
        transport.textContent = "8"
    }
})