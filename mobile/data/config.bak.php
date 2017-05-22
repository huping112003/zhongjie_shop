<?php

// +----------------------------------------------------------------------
// | EcTouch [ רע�ƶ�����: �̴������Ƽ� ]
// +----------------------------------------------------------------------
// | Copyright (c) 2014 http://cub168.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: EcTouch Team <zhong@cub168.com> (QQ: 2880175560)
// +----------------------------------------------------------------------

if (!defined('IN_ECTOUCH')){
    die('Hacking attempt');
}

//Ĭ������
require(dirname(__FILE__) . '/convention.php');


//��վȫ������
$config['site_name'] = '�Ϻ��̴������Ƽ����޹�˾'; //վ������
$config['site_url']="http://".$_SERVER['HTTP_HOST']."/luntai/"; //���԰���ַ
$config['site_email'] = 'admin@cub168.com'; //����Ա����
$config['site_phone'] = '021-68686868'; //��˾�绰
$config['site_fax'] = '021-68686868-801'; //��������
$config['site_address'] = '�Ϻ�����������ɽ��·'; //��˾��ַ
$config['site_postcode'] = '200062'; //��˾�ʱ�
$config['site_image_maxwidth'] = '600'; //����ͼƬ��������
$config['site_summary_length'] = '360'; //����ժҪ����
$config['site_copyright'] = 'Copyright ? 2014 �Ϻ��̴������Ƽ����޹�˾, All Rights Reserved'; //��Ȩ��Ϣ
$config['site_statcode'] = ''; //������ͳ�ƴ���
$config['site_icp'] = '��ICP��10000��1'; //ICP ������Ϣ
$config['site_title'] = '�Ϻ��̴������Ƽ����޹�˾'; //��ҳ����
$config['site_keywords'] = ''; //վ���ؼ���
$config['site_description'] = ''; //վ������
$config['site_closed'] = false; //�Ƿ��ر���վ
$config['site_closedreason'] = 'EcTouch��δ���ţ�������<a href="'.$config['site_url'].'">���԰�</a>��'; //�ر���վ��ԭ��
$config['site_themes'] = 'default'; //ģ�����⣬һ�㲻��Ҫ�޸�
//$config['site_pagebreak'] = '_baidu_page_break_tag_'; //���ݷ�ҳ��ǩ
$config['site_pagebreak'] = '&lt;hr style=&quot;page-break-after:always;&quot; class=&quot;ke-pagebreak&quot; /&gt;'; //���ݷ�ҳ��ǩ
$config['site_attachment'] = 'data/attachment/'; //����Ŀ¼
$config['site_pagesize'] = 12; //��վ��ҳ����
//��������������
$config['SMTP_HOST'] = 'smtp.163.com'; //smtp��������ַ
$config['SMTP_PORT'] = '25'; //smtp�������˿�
$config['SMTP_SSL'] = false; //�Ƿ�����SSL��ȫ���ӣ�gmail��Ҫ����sll��ȫ����
$config['SMTP_USERNAME'] = 'win8mail@163.com'; //smtp�������ʺţ��磺����qq����
$config['SMTP_PASSWORD'] = '125243230!'; //smtp�������ʺ����룬������qq��������
$config['SMTP_FROM_TO'] = 'win8mail@163.com'; //�������ʼ���ַ
$config['SMTP_FROM_NAME'] = 'ϵͳ�ʼ�'; //����������
$config['SMTP_CHARSET'] = 'utf-8'; //���͵��ʼ����ݱ���
//EcTouch�汾
$config['ver'] = '0.1'; //�汾��
$config['ver_name'] = '�̴����� 0.1 ���԰�'; //�汾����
$config['ver_date'] = '201101281800'; //�汾ʱ��
$config['ver_author'] = '�̴�����';
$config['ver_email'] = 'support@cub168.com';
$config['ver_url'] = 'http://www.cub168.com/';