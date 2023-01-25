const soupbtn = document.querySelector('.soupbtn');
const soup = document.querySelector('.soup');
const saladbtn = document.querySelector('.saladbtn');
const salad = document.querySelector('.salad');
const foodbtn = document.querySelector('.foodbtn');
const food = document.querySelector('.food');
const breackfastbtn = document.querySelector('.breackfastbtn');
const breackfast = document.querySelector('.breackfast');
const drinkbtn = document.querySelector('.drinkbtn');
const drink = document.querySelector('.drink');


    function soupButtonClick(){
        soup.scrollIntoView({block: "start", behavior: "smooth"});
}
function saladButtonClick(){
    salad.scrollIntoView({block: "start", behavior: "smooth"});
}
function breackfastButtonClick(){
    breackfast.scrollIntoView({block: "start", behavior: "smooth"});
}

function foodButtonClick(){
    food.scrollIntoView({block: "start", behavior: "smooth"});
}
function drinkButtonClick(){
    drink.scrollIntoView({block: "start", behavior: "smooth"});
}
soupbtn.addEventListener("click", soupButtonClick);
saladbtn.addEventListener("click", saladButtonClick);
foodbtn.addEventListener("click", foodButtonClick);
breackfastbtn.addEventListener("click", breackfastButtonClick);
drinkbtn.addEventListener("click", drinkButtonClick);
