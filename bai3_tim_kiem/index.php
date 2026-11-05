<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Live Search tên học phần bằng PHP và AJAX</title>
<style>
body{font-family:Arial,sans-serif;margin:40px}
.search-box{width:320px;max-width:100%;position:relative;font-size:14px}
.search-box input{height:36px;padding:5px 10px;border:1px solid #aaa;font-size:14px;width:100%;box-sizing:border-box}
.result{position:absolute;z-index:10;top:100%;left:0;width:100%;background:#fff}
.result p{margin:0;padding:9px 10px;border:1px solid #ccc;border-top:0;cursor:pointer}
.result p:hover{background:#f2f2f2}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(function(){
  $('.search-box input[type="text"]').on('keyup input', function(){
    const term = $(this).val();
    const result = $(this).siblings('.result');
    if(term.trim().length){
      $.get('backend-search.php',{term:term},function(data){result.html(data);});
    } else result.empty();
  });
  $(document).on('click','.result p[data-value]',function(){
    $('.search-box input[type="text"]').val($(this).data('value'));
    $(this).parent('.result').empty();
  });
  $(document).on('click',function(e){
    if(!$(e.target).closest('.search-box').length) $('.result').empty();
  });
});
</script>
</head>
<body>
<h2>Tìm kiếm tên học phần</h2>
<div class="search-box">
<input type="text" autocomplete="off" placeholder="Search tên học phần...">
<div class="result"></div>
</div>
</body>
</html>
