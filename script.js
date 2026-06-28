window.addEventListener("scroll",function(){

const cards=document.querySelectorAll(".book-card,.why-card,.category-card");

cards.forEach(card=>{

const position=card.getBoundingClientRect().top;

const screen=window.innerHeight;

if(position<screen-100){

card.style.opacity="1";

card.style.transform="translateY(0)";

}

});

});
$(".cart-button").click(function(){

$("#toast").fadeIn();

setTimeout(function(){

$("#toast").fadeOut();

},2000);

});