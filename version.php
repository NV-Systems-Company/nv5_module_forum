<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NVHOLDING (ceo@nvholding.vn)
 * @Copyright (C) 2020 nvholding.vn. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate  Wed, 01 Jan 2020 01:01:20 GMT+7
 */
 
 if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$module_version = array( 
    'name' => 'Forum', 
    'modfuncs' => 'main, content, post, viewnode, threads', 
	'change_alias' => '',
    'submenu' => 'view', 
	'layoutdefault' => 'body:main',
	'is_sysmod' => 1, 
    'virtual' => 0, 
    'version' => '5.0.00', 
    'date' => 'Wed, 01 Jan 2020 01:01:20 GMT+7', 
    'author' => 'NVHOLDING (ceo@nvholding.vn)', 
    'note' => '', 
	'uploads_dir' => array( 
        $module_name,
		$module_name . '/node',
		$module_name . '/attachments',
		$module_name . '/attach_thumb'
	) 
);