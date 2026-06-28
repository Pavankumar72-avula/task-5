$(document).ready(function(){

let category="All";

function loadBooks(search,category){

$.ajax({

url:"search_books.php",

type:"POST",

data:{
search:search,
category:category
},

success:function(data){

$("#bookContainer").html(data);

}

});

}

$("#search").keyup(function(){

loadBooks($(this).val(),category);

});

$(".category").click(function(){

$(".category").removeClass("active");

$(this).addClass("active");

category=$(this).data("category");

loadBooks($("#search").val(),category);

});

});