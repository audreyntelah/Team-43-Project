window.addEventListener('scroll', scrollFunction);

function scrollFunction() {
    const logoDiv = document.getElementById("logo_div");
    const logo = document.getElementById("logo");

    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        logoDiv.style.padding = "10px 5px";
        logo.style.width = "5%";
        logo.style.height = "5%";
    } else {
        logoDiv.style.padding = "10px 10px";
        logo.style.width = "300px";
        logo.style.height = "300px";
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.card-container button');

    addToCartButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            const card = document.querySelector(`.Card${index + 1}`);
            console.log(`Button ${index + 1} clicked`);
            card.classList.toggle('added-to-cart');
        });
    });
});
function sortProducts() {
    var sortOrder = document.getElementById("sortOrder").value;
    var cardsContainer = document.querySelector(".card-container");
    var cards = Array.from(cardsContainer.children);

    if (sortOrder === "lowToHigh") {
        cards.sort(function (a, b) {
            var priceA = parseFloat(a.querySelector(".price").textContent.replace("£", ""));
            var priceB = parseFloat(b.querySelector(".price").textContent.replace("£", ""));
            return priceA - priceB;
        });
    } else if (sortOrder === "highToLow") {
        cards.sort(function (a, b) {
            var priceA = parseFloat(a.querySelector(".price").textContent.replace("£", ""));
            var priceB = parseFloat(b.querySelector(".price").textContent.replace("£", ""));
            return priceB - priceA;
        });
    } else {
        cards.sort(function (a, b) {
            return parseInt(a.className.match(/\d+/)[0]) - parseInt(b.className.match(/\d+/)[0]);
        });
    }

    cards.forEach(function (card) {
        cardsContainer.appendChild(card);
    });
}


document.addEventListener("DOMContentLoaded", function () {
    var allTags = [];
    var cards = document.querySelectorAll('.card-container > div');
    cards.forEach(function (card) {
        var tags = card.getAttribute('data-tags');
        if (tags) {
            var tagArray = tags.split(',').map(tag => tag.trim());
            allTags = allTags.concat(tagArray);
        }
    });
    var uniqueTags = [...new Set(allTags)];

    var tagFilter = document.getElementById('tagFilter');
    uniqueTags.forEach(function (tag) {
        var option = document.createElement('option');
        option.value = tag;
        option.textContent = tag;
        tagFilter.appendChild(option);
    });
});
function filterCards() {
    var selectedTag = document.getElementById("tagFilter").value;
    var cards = document.querySelectorAll(".card-container > div");

    cards.forEach(function (card) {
        var tags = card.getAttribute("data-tags").split(", ").map(tag => tag.trim()); 

        if (selectedTag === "all" || tags.includes(selectedTag)) {
            card.style.display = "block";
            card.style.width = "calc(20% - 100px)";
        } else {
            card.style.display = "none";
        }
    });
}
        


  