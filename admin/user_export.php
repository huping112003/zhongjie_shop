<?php
/**
 *  商品批量上传、修改
 * ============================================================================
 * CUB168
 * 网站地址: http://www.cub168.com；
 * ============================================================================
 * $Author: cub168
 * $Id: goods_batch.php
 */

define('IN_ECS', true);
set_time_limit(0);
require(dirname(__FILE__) . '/includes/init.php');
require('includes/lib_goods.php');

/*------------------------------------------------------ */
//-- 批量上传
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'add')
{
    /* 检查权限 */
    admin_priv('users_manage');

    /* 取得可选语言 */
    $dir = opendir('../languages');
    $lang_list = array(
        'UTF8'      => $_LANG['charset']['utf8'],
        'GB2312'    => $_LANG['charset']['zh_cn'],
        'BIG5'      => $_LANG['charset']['zh_tw'],
    );
    $smarty->assign('lang_list', $lang_list);

    /* 参数赋值 */
    $ur_here = '导入会员';
    $smarty->assign('ur_here', $ur_here);

    /* 显示模板 */
    assign_query_info();
    $smarty->display('user_export_add.htm');
}

/*------------------------------------------------------ */
//-- 批量上传：处理
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'upload')
{
    /* 检查权限 */
    admin_priv('users_manage');

    /* 将文件按行读入数组，逐行进行解析 */
    $line_number = 0;
    $arr = array();
    $goods_list = array();
    $data = file($_FILES['file']['tmp_name']);

    foreach ($data AS $line)
    {
        // 跳过第一行
        if ($line_number == 0)
        {
            $line_number++;
            continue;
        }

        // 转换编码
        $line = mb_convert_encoding($line, 'UTF8', 'GBK');
        // 初始化
        $arr    = array();
        $buff   = '';
        $quote  = 0;
        $len    = strlen($line);
        for ($i = 0; $i < $len; $i++)
        {
            $char = $line[$i];

            if ('\\' == $char)
            {
                $i++;
                $char = $line[$i];

                switch ($char)
                {
                    case '"':
                        $buff .= '"';
                        break;
                    case '\'':
                        $buff .= '\'';
                        break;
                    case ',';
                        $buff .= ',';
                        break;
                    default:
                        $buff .= '\\' . $char;
                        break;
                }
            }
            elseif ('"' == $char)
            {
                if (0 == $quote)
                {
                    $quote++;
                }
                else
                {
                    $quote = 0;
                }
            }
            elseif (',' == $char)
            {
                if (0 == $quote)
                {
                    $arr[count($arr)] = trim($buff);
                    $buff = '';
                    $quote = 0;
                }
                else
                {
                    $buff .= $char;
                }
            }
            else
            {
                $buff .= $char;
            }

            if ($i == $len - 1)
            {
                $arr[count($arr)] = trim($buff);
            }

        }
        $goods_list[] = $arr;
    }

    if($goods_list){
        foreach($goods_list as $key=>$val){
            $user_data = array();
            $address = array();
            // if(strrpos($val[4], '/') !== false){
            //     $phone = explode('/', $val[4]);
            //     $user_data['mobile_phone'] = trim($phone[0]);
            //     $user_data['home_phone'] = trim($phone[1]);
            // }
            // else{
            //     $user_data['mobile_phone'] = trim($val[4]);
            // }
// echo '<pre>';print_r($val);die;
            // $user_data['mobile_phone'] = trim($val[6]);
            // $user_data['home_phone'] = trim($val[5]);
            // $user_data['user_name'] = trim($val[0]);
            // $user_data['password'] = empty($val[1]) ? md5('123456') : md5(trim($val[1]));
            // $user_data['office_phone'] = trim($val[5]);
            // $user_data['company'] = trim($val[7]);
            // $user_data['salesman'] = trim($val[9]);
            
            $user_data['mobile_phone'] = trim($val[6]);
            $user_data['home_phone'] = trim($val[5]);
            $user_data['user_name'] = trim($val[0]);
            $user_data['password'] = empty($user_data['mobile_phone']) ? md5('123456') : md5($user_data['mobile_phone']);
            $user_data['office_phone'] = trim($val[5]);
            $user_data['company'] = trim($val[3]);
            $user_data['salesman'] = trim($val[9]);
            $db->autoExecute($ecs->table('users'), $user_data, 'INSERT');
            $user_id = $db->insert_id();

            //收货地址
            $address['user_id'] = $user_id;
            $address['consignee'] = trim($val[4]);
            $address['country'] = 1;
            if(trim($val[8]) == '上海'){
                $address['province'] = 25;
                $address['city'] = 321;
                $address['district'] = 0;
            }
            elseif(trim($val[8]) == '南京'){
                $address['province'] = 16;
                $address['city'] = 220;
                $address['district'] = 0;
            }
            $address['address'] = trim($val[7]);
            $address['mobile'] = $user_data['mobile_phone'];
            $db->autoExecute($ecs->table('user_address'), $address, 'INSERT');
            $address_id = $db->insert_id();

            $db->query("UPDATE " . $ecs->table('users') . " SET address_id = '$address_id' WHERE user_id ='" . $user_id . "'");
        }
    }
    // 记录日志
    // admin_log('', 'batch_upload', 'goods');

    /* 显示提示信息，返回商品列表 */
    $link[] = array('href' => 'users.php?act=list', 'text' => '会员列表');
    sys_msg('导入成功', 0, $link);
}

/*------------------------------------------------------ */
//-- 批量上传：入库
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'insert')
{
    /* 检查权限 */
    admin_priv('goods_batch');

    if (isset($_POST['checked']))
    {
        include_once(ROOT_PATH . 'includes/cls_image.php');
        $image = new cls_image($_CFG['bgcolor']);

        /* 字段默认值 */
        $default_value = array(
            'brand_id'      => 0,
            'goods_number'  => 0,
            'goods_weight'  => 0,
            'market_price'  => 0,
            'shop_price'    => 0,
            'warn_number'   => 0,
            'is_real'       => 1,
            'is_on_sale'    => 1,
            'is_alone_sale' => 1,
            'integral'      => 0,
            'is_best'       => 0,
            'is_new'        => 0,
            'is_hot'        => 0,
            'goods_type'    => 0,
        );

        /* 查询品牌列表 */
        $brand_list = array();
        $sql = "SELECT brand_id, brand_name FROM " . $ecs->table('brand');
        $res = $db->query($sql);
        while ($row = $db->fetchRow($res))
        {
            $brand_list[$row['brand_name']] = $row['brand_id'];
        }

        /* 字段列表 */
        $field_list = array_keys($_LANG['upload_goods']);
        $field_list[] = 'goods_class'; //实体或虚拟商品
        $field_list[] = 'attr';  //商品属性

        $attr_id = trim($_POST['attr_id']);
        $attr_id_arr = explode(',', $attr_id);

        /* 获取商品good id */
        $max_id = $db->getOne("SELECT MAX(goods_id) + 1 FROM ".$ecs->table('goods'));

        /* 循环插入商品数据 */
        foreach ($_POST['checked'] AS $key => $value)
        {
            // 合并
            $field_arr = array(
                'cat_id'        => $_POST['cat'],
                'add_time'      => gmtime(),
                'last_update'   => gmtime(),
            );

            foreach ($field_list AS $field)
            {
                // 转换编码
                $field_value = isset($_POST[$field][$value]) ? $_POST[$field][$value] : '';

                /* 虚拟商品处理 */
                if ($field == 'goods_class')
                {
                    $field_value = intval($field_value);
                    if ($field_value == G_CARD)
                    {
                        $field_arr['extension_code'] = 'virtual_card';
                    }
                    continue;
                }
                //商品属性处理
                $field_arr['goods_type'] = 0;
                if($field == 'attr'){
                    $field_value = trim($field_value);
                    $goods_attr_arr = array();
                    if($attr_id_arr){
                        foreach($attr_id_arr as $k=>$val){
                            $attr_row = explode(',', $field_value);
                            $goods_attr_arr[$k]['attr_id'] = $val;
                            $goods_attr_arr[$k]['attr_value'] = $attr_row[$k];
                        }
                        $field_arr['goods_type'] = $db->getOne("SELECT cat_id FROM ".$ecs->table('attribute')." WHERE attr_id = ".$attr_id_arr[0]);
                    }
                }

                // 如果字段值为空，且有默认值，取默认值
                $field_arr[$field] = !isset($field_value) && isset($default_value[$field]) ? $default_value[$field] : $field_value;

                // 特殊处理
                if (!empty($field_value))
                {
                    // 图片路径
                    if (in_array($field, array('original_img', 'goods_img', 'goods_thumb')))
                    {
                        if(strpos($field_value,'|;')>0)
                        {
                            $field_value=explode(':',$field_value);
                            $field_value=$field_value['0'];
                            @copy(ROOT_PATH.'images/'.$field_value.'.tbi',ROOT_PATH.'images/'.$field_value.'.jpg');
                            if(is_file(ROOT_PATH.'images/'.$field_value.'.jpg'))
                            {
                                $field_arr[$field] =IMAGE_DIR . '/' . $field_value.'.jpg';
                            }
                        }
                        else
                        {
                            $field_arr[$field] = IMAGE_DIR . '/' . $field_value;
                        }
                    }
                    // 品牌
                    elseif ($field == 'brand_name')
                    {
                        if (isset($brand_list[$field_value]))
                        {
                            $field_arr['brand_id'] = $brand_list[$field_value];
                        }
                        else
                        {
                            $sql = "INSERT INTO " . $ecs->table('brand') . " (brand_name) VALUES ('" . addslashes($field_value) . "')";
                            $db->query($sql);
                            $brand_id = $db->insert_id();
                            $brand_list[$field_value] = $brand_id;
                            $field_arr['brand_id'] = $brand_id;
                        }
                    }
                    // 整数型
                    elseif (in_array($field, array('goods_number', 'warn_number', 'integral')))
                    {
                        $field_arr[$field] = intval($field_value);
                    }
                    // 数值型
                    elseif (in_array($field, array('goods_weight', 'market_price', 'shop_price')))
                    {
                        $field_arr[$field] = floatval($field_value);
                    }
                    // bool型
                    elseif (in_array($field, array('is_best', 'is_new', 'is_hot', 'is_on_sale', 'is_alone_sale', 'is_real')))
                    {
                        //add by wanglu
                        if(in_array($field, array('is_on_sale', 'is_alone_sale', 'is_real'))){
                            $field_arr[$field] = 1;
                        }
                        else{
                            $field_arr[$field] = intval($field_value) > 0 ? 1 : 0;
                        }
                    }
                }

                if ($field == 'is_real')
                {
                    $field_arr[$field] = 1;
                    //$field_arr[$field] = intval($_POST['goods_class'][$key]);
                }

                if($field == 'attr'){
                    unset($field_arr[$field]);
                }
            }
            if (empty($field_arr['goods_sn']))
            {
                $field_arr['goods_sn'] = generate_goods_sn($max_id);
            }

            /* 如果是虚拟商品，库存为0 */
            if ($field_arr['is_real'] == 0)
            {
                $field_arr['goods_number'] = 0;
            }
            //商品图片
            $img_path = ROOT_PATH . IMAGE_DIR .'/product_img/'.$field_arr['goods_sn'].'/img/';
            //详情图片
            $info_path = ROOT_PATH . IMAGE_DIR .'/product_img/'.$field_arr['goods_sn'].'/info/';
            $img_files = glob($img_path . '*');
            $info_files = glob($info_path . '*');

            if($img_files){
                foreach($img_files as $k=>$val){
                    $img_files[$k] = str_replace(ROOT_PATH, '', $val);
                }
            }

            //商品内容
            $field_arr['goods_desc'] = '';
            if($info_files){
                foreach($info_files as $k=>$val){
                    $val = str_replace(ROOT_PATH, '', $val);
                    $field_arr['goods_desc'] .= '<p><img src="'.$val.'" width="100%" height="100%"></p>';
                }
            }
            $db->autoExecute($ecs->table('goods'), $field_arr, 'INSERT');
            $goods_id = $db->insert_id();

            $max_id = $db->insert_id() + 1;

            //添加商品属性
            if($goods_attr_arr){
                foreach($goods_attr_arr as $val){
                    $val['goods_id'] = $goods_id;
                    $db->autoExecute($ecs->table('goods_attr'), $val, 'INSERT');
                }
            }

            if($img_files){
                //修改商品图

                $db->query("UPDATE " . $ecs->table('goods') . " SET goods_img = '$img_files[0]', goods_thumb = '$img_files[0]', original_img = '$img_files[0]' WHERE goods_id='" . $goods_id . "'");
                foreach($img_files as $img){
                    $gallery['goods_id'] = $goods_id;
                    $gallery['img_url'] = $img;
                    $gallery['thumb_url'] = $img;
                    $gallery['img_original'] = $img;
                    $db->autoExecute($ecs->table('goods_gallery'), $gallery, 'INSERT');
                }
            }


            /* 如果图片不为空,修改商品图片，插入商品相册*/
            if (!empty($field_arr['original_img']) || !empty($field_arr['goods_img']) || !empty($field_arr['goods_thumb']))
            {
                $goods_img     = '';
                $goods_thumb   = '';
                $original_img  = '';
                $goods_gallery = array();
                $goods_gallery['goods_id'] = $goods_id;

                if (!empty($field_arr['original_img']))
                {
                    //设置商品相册原图和商品相册图
                    if ($_CFG['auto_generate_gallery'])
                    {
                        $ext         = substr($field_arr['original_img'], strrpos($field_arr['original_img'], '.'));
                        $img         = dirname($field_arr['original_img']) . '/' . $image->random_filename() . $ext;
                        $gallery_img = dirname($field_arr['original_img']) . '/' . $image->random_filename() . $ext;
                        @copy(ROOT_PATH . $field_arr['original_img'], ROOT_PATH . $img);
                        @copy(ROOT_PATH . $field_arr['original_img'], ROOT_PATH . $gallery_img);
                        $goods_gallery['img_original'] = reformat_image_name('gallery', $goods_gallery['goods_id'], $img, 'source');
                    }
                    //设置商品原图
                    if ($_CFG['retain_original_img'])
                    {
                        $original_img                  = reformat_image_name('goods', $goods_gallery['goods_id'], $field_arr['original_img'], 'source');
                    }
                    else
                    {
                        @unlink(ROOT_PATH . $field_arr['original_img']);
                    }
                }

                if (!empty($field_arr['goods_img']))
                {
                    //设置商品相册图
                    if ($_CFG['auto_generate_gallery'] && !empty($gallery_img))
                    {
                        $goods_gallery['img_url'] = reformat_image_name('gallery', $goods_gallery['goods_id'], $gallery_img, 'goods');
                    }
                    //设置商品图
                    $goods_img                = reformat_image_name('goods', $goods_gallery['goods_id'], $field_arr['goods_img'], 'goods');
                }

                if (!empty($field_arr['goods_thumb']))
                {
                    //设置商品相册缩略图
                    if ($_CFG['auto_generate_gallery'])
                    {
                        $ext           = substr($field_arr['goods_thumb'], strrpos($field_arr['goods_thumb'], '.'));
                        $gallery_thumb = dirname($field_arr['goods_thumb']) . '/' . $image->random_filename() . $ext;
                        @copy(ROOT_PATH . $field_arr['goods_thumb'], ROOT_PATH . $gallery_thumb);
                        $goods_gallery['thumb_url'] = reformat_image_name('gallery_thumb', $goods_gallery['goods_id'], $gallery_thumb, 'thumb');
                    }
                    //设置商品缩略图
                    $goods_thumb = reformat_image_name('goods_thumb', $goods_gallery['goods_id'], $field_arr['goods_thumb'], 'thumb');
                }

                //修改商品图
                $db->query("UPDATE " . $ecs->table('goods') . " SET goods_img = '$goods_img', goods_thumb = '$goods_thumb', original_img = '$original_img' WHERE goods_id='" . $goods_gallery['goods_id'] . "'");

                //添加商品相册图
                if ($_CFG['auto_generate_gallery'] && $goods_gallery)
                {
                    $db->autoExecute($ecs->table('goods_gallery'), $goods_gallery, 'INSERT');
                }
            }
        }
    }

    // 记录日志
    admin_log('', 'batch_upload', 'goods');

    /* 显示提示信息，返回商品列表 */
    $link[] = array('href' => 'goods.php?act=list', 'text' => $_LANG['01_goods_list']);
    sys_msg($_LANG['batch_upload_ok'], 0, $link);
}
?>
