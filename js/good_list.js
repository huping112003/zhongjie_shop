$(function () {
    $(".addcart").on('click', 'span',function (e) {
        var goods_id = $(this).parent().find('.cart_id').text();
        if ($(this).hasClass("add")) {
            countNum(1, goods_id);
        } else {
            countNum(-1, goods_id);
        }
        return false;

    });

})
function countNum(i, goods_id) {
    var $count_box = $("#skunum" + goods_id);
    var $input = $count_box.find('input');
    var num = $input.val();

    if (!$.isNumeric(num)) {
        alert("请您输入正确的购买数量!");
        $input.val('1');
        return;
    }
    num = parseInt(num) + i;
    switch (true) {
        case num == 0:
            $input.val('1');
            alert('您至少得购买1件商品！');
            break;
        default:
            $input.val(num);
            break;
    }
}
/* *
 * 添加商品到购物车
 */
function addToCartList(goodsId, parentId)
{
    var goods        = new Object();
    var spec_arr     = new Array();
    var fittings_arr = new Array();

    var number       = $("#skunum"+goodsId).find('input').val();
    var formBuy      = document.forms['ECS_FORMBUY'];
    var quick		   = 0;

    // 检查是否有商品规格
    if (formBuy)
    {
        spec_arr = getSelectedAttributes(formBuy);

        if (formBuy.elements['number'])
        {
            number = formBuy.elements['number'].value;
        }

        quick = 1;
    }

    goods.quick    = quick;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);

    Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), addToCartResponse, 'POST', 'JSON');
}
function signIn()
{
    var frm = document.forms['ECS_LOGINFORM'];
    if (frm)
    {
        var username = frm.elements['username'].value;
        var password = frm.elements['password'].value;
        var captcha = '';
        if (frm.elements['captcha'])
        {
            captcha = frm.elements['captcha'].value;
        }
        if (username.length == 0 || password.length == 0)
        {
            alert('用户名或密码不能为空！');
            return;
        }
        else
        {
            Ajax.call('user.php?act=signin', 'username=' + username + '&password=' + encodeURIComponent(password) + '&captcha=' + captcha, signinResponse, "POST", "TEXT");
        }
    }
    else
    {
        alert('Template error!');
    }
}
function signinResponse(result)
{
    var userName = document.forms['ECS_LOGINFORM'].elements['username'].value;
    var mzone = document.getElementById("ECS_MEMBERZONE");
    var res   = $.evalJSON(result);
    if (res.error > 0)
    {
        alert(res.content);
        if(res.html)
        {
            mzone.innerHTML = res.html;
            document.forms['ECS_LOGINFORM'].elements['username'].value = userName;
        }
    }
    else
    {
        if (mzone)
        {
            mzone.innerHTML = res.content;
            evalscript(res.ucdata);
            //alert(res.ucdata);
        }
        else
        {
            //alert(res.content);
            window.location.reload()
        }
    }
}

