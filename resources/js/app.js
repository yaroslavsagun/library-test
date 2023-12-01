import './bootstrap';

$(document).ready(function(){
    $(".book_pagination li").click(function(){
        if($(this).hasClass("active")) return;
        let page = parseInt($(this).text());
        $('.book_pagination li').removeClass("active");
        $(this).addClass("active");
        
        $.ajax({url: "/paginate?page="+page, dataType:'json', success: function(data) {
            $(".book-list").html("");
            data.forEach(book => {
                $(".book-list").append('<div class="card mt-3"><div class="card-header"><b>'+book.name+'</b></div><div class="card-body"><ul><li>Author: '+book.authors.map(elem => elem['name']).join(", ")+'</li><li>Publishing House: '+book.publishers.map(elem => elem['name']).join(", ")+'</li></ul></div></div>');
            });
        }})
    })
})