/**
 * Created by Administrator on 2017/12/11.
 */
$(function () {
    var dom = $(".article-content").find('pre');
    var html = '<div  class="copyCode glyphicon glyphicon-edit">点击复制代码</div>';
    dom.each(function (i, ele) {
        $(ele).before(html);
    });
    $(".copyCode").on('click', function () {
        $(this).next().addClass('active').attr('contentEditable', 'true').focus()
    })
})