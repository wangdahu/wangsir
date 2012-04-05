$(function(){
    // 弹出控制
    $.fn.extend({
        togglepop: function() {
            if(this.css('display') == 'none') {
                this.data('overflowY', $(document.body).css('overflowY'));
                $(document.body).css('overflowY', 'hidden');
            }
            this.toggle();
            if(this.css('display') == 'none') {
                $(document.body).css('overflowY', this.data('overflowY'));
            }
        }
    });

    // 点击弹出
    $(".sign, .js-close").click(function(){
        $(".floor").togglepop();
    });

    // Esc 弹出消失
    $(document).keydown(function(e){
        if(e.keyCode == 27) {
            $(".floor").is(":visible") && $(".floor").togglepop();
        }
    });

    // 签名提交
    $("#sign_form").submit(function(){
        $.post(this.action, $(this).serialize(), function(json){
            if(json.status !== 1){
                alert("Sorry, 签到失败!" + json.msg);
            } else {
                location.reload();
            }
        }, 'json');
        return false;
    });
});
