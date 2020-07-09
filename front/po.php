<style>
#b1 .tags{
    cursor:pointer;
    margin:10px;
    color:blue; 
}
#b1,#b2{
    display:inline-block;
    vertical-align: top;
}

#b1{
    width:15%
}
#b2{
    width:75%;
}
</style>

<div>目前位置:首頁 > 分類網誌 ><span id="nav"></span></div>
<fieldset id="b1">
<legend>分類網誌</legend><span id="nav"></span>
<div id="1" class="tags">健康新知</div>
<div id="2" class="tags">菸害防制</div>
<div id="3" class="tags">癌症防治</div>
<div id="4" class="tags">慢性病防治</div>
</fieldset>
<fieldset id="b2">
<legend>文章列表</legend>
<div id="list"></div>
</fieldset>

<script>
getList(1);
nav(1)

$(".tags").on("click",function(){
    let type=$(this).attr("id");
    nav(type);
    getList(type);
})

function nav(id){
let text=$("#"+id).html();
$("#nav").html(text);
}

function getList(type){
    $.get("./api/getlist.php",{type},function(list){
        $("#list").html(list);
    })
}

function getNews(id){
    $.get("./api/getnews.php",{id},function(news){
        $("#list").html(news);
    })
}
</script>