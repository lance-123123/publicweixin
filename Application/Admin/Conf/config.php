<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'  =>  array(
								'__STATIC__' => __ROOT__ . '/Public/Admin/static',
							 	'__JS__'     =>  __ROOT__.'/Public/Admin/js',
							 	'__CSS__'     => __ROOT__. '/Public/Admin/css', 
							 	'__IMG__'    => __ROOT__.'/Public/Admin/image',
                                '__UPLOADS__'    => __ROOT__.'/Uploads/'
						     ),
    'DEFAULT_CONTROLLER'    =>  'Public', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'login', // 默认操作名称
);