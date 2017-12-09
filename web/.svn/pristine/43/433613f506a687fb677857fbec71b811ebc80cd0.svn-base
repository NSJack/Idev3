<div id='x'>
    button
    <div id='a' style="z-index:1000;position: absolute; display: none;width:200px;height:200px;background:#ccc">
        我是鼠标滑过弹出菜单
    </div>
</div>

<script>
$(document).ready(function(){
    var x = $("#x");
    var a = $("#a");
    var lt = x.position();
    var top = lt.top + x.height();
    var left = lt.left;
    console.log(lt);

    x.mouseover(function(){
        a.css({'left':left, 'top':top, 'display': ''});
    }).mouseout(function(){
        a.css({'left':0, 'top':0, 'display': 'none'});
    });
});
</script>