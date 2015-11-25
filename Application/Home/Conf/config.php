<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'  =>  array(
								'__STATIC__' => __ROOT__ . '/Public/Home/static',
							 	'__JS__'     =>  __ROOT__.'/Public/Home/js',
							 	'__CSS__'     => __ROOT__. '/Public/Home/css', 
							 	'__IMG__'    => __ROOT__.'/Public/Home/image',
                                '__UPLOADS__'    => __ROOT__.'/Uploads/'
						     ),
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
);