//AJAX 表单提交
$("form").submit(function () {
    $.ajax({
        async: false,
        type: "POST",
        url: $(this).attr("action"),
        data: $(this).serialize(),
        error: function (request) {
            layer.msg("未知错误");
        },
        success: function (data) {
            if (data.code === 1) {
                layer.msg(data.msg, { icon: 1 });
                var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                if (index) {
                    setTimeout(function () {
                        parent.window.location.reload();
                        parent.layer.close(index);
                        
                    }, 600);
                }
                setTimeout(function () {
                    location.href = data.url;
                }, 600);
            } else if (data.code === 0) {
                layer.msg(data.msg, { icon: 5 });
            }
        }
    });
    return false;
});