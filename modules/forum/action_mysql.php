<?php

if (!defined('NV_IS_FILE_MODULES')) {
    die('Stop!!!');
}




$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment_data";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment_view";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_deletion_log";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_draft";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_edit_history";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_prefix";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_read";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_watch";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_ip";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_liked_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_link_forum";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderation_queue";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator_log";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_node";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_cache_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_combination";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_combination_user_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_entry";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_entry_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_interface_group";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll_response";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll_vote";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_post";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_post_history";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_session_activity";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag_content";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag_result_cache";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_read";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_redirect";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_reply_ban";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_user_post";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_view";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_watch";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_users_privacy";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_users_profile";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment (
  attachment_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  data_id int(10) UNSIGNED NOT NULL,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  attach_date int(10) UNSIGNED NOT NULL,
  md5filename varchar(50) NOT NULL DEFAULT '',
  temp_hash varchar(32) NOT NULL DEFAULT '',
  unassociated tinyint(3) UNSIGNED NOT NULL,
  view_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (attachment_id),
  UNIQUE KEY md5filename (md5filename),
  KEY content_type_id_date (content_type,content_id,attach_date),
  KEY temp_hash_attach_date (temp_hash,attach_date),
  KEY unassociated_attach_date (unassociated,attach_date)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment_data (
  data_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userid int(10) UNSIGNED NOT NULL,
  upload_date int(10) UNSIGNED NOT NULL,
  filename varchar(100) NOT NULL,
  file_size int(10) UNSIGNED NOT NULL,
  file_hash varchar(32) NOT NULL,
  file_path varchar(250) NOT NULL DEFAULT '',
  width int(10) UNSIGNED NOT NULL DEFAULT '0',
  height int(10) UNSIGNED NOT NULL DEFAULT '0',
  thumbnail_width int(10) UNSIGNED NOT NULL DEFAULT '0',
  thumbnail_height int(10) UNSIGNED NOT NULL DEFAULT '0',
  attach_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (data_id),
  KEY userid_upload_date (userid,upload_date),
  KEY attach_count (attach_count),
  KEY upload_date (upload_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_attachment_view (
  attachment_id int(10) UNSIGNED NOT NULL,
  KEY attachment_id (attachment_id)
) ENGINE=MEMORY ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_deletion_log (
  content_type varbinary(25) NOT NULL,
  content_id int(11) NOT NULL,
  delete_date int(11) NOT NULL,
  delete_user_id int(11) NOT NULL,
  delete_username varchar(50) NOT NULL,
  delete_reason varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (content_type,content_id),
  KEY delete_user_id_date (delete_user_id,delete_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_draft (
  draft_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  draft_key varbinary(75) NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  last_update int(10) UNSIGNED NOT NULL,
  message mediumtext NOT NULL,
  extra_data mediumblob NOT NULL,
  PRIMARY KEY (draft_id),
  UNIQUE KEY draft_key_user (draft_key,userid),
  KEY last_update (last_update)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_edit_history (
  edit_history_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  edit_user_id int(10) UNSIGNED NOT NULL,
  edit_date int(10) UNSIGNED NOT NULL,
  old_text mediumtext NOT NULL,
  PRIMARY KEY (edit_history_id),
  KEY content_type (content_type,content_id,edit_date),
  KEY edit_date (edit_date),
  KEY edit_user_id (edit_user_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum (
  node_id int(10) UNSIGNED NOT NULL,
  discussion_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  message_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  last_post_id int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Most recent post_id',
  last_post_date int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Date of most recent post',
  last_post_user_id int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'User_id of user posting most recently',
  last_post_username varchar(50) NOT NULL DEFAULT '' COMMENT 'Username of most recently-posting user',
  last_thread_title varchar(150) NOT NULL DEFAULT '' COMMENT 'Title of thread most recent post is in',
  moderate_threads tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  moderate_replies tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  allow_posting tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  allow_poll tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  count_messages tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'If not set, messages posted (directly) within this forum will not contribute to user message totals.',
  find_new tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Include posts from this forum when running /find-new/threads',
  prefix_cache mediumblob NOT NULL COMMENT 'Serialized data from xf_forum_prefix, [group_id][prefix_id] => prefix_id',
  default_prefix_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  default_sort_order varchar(25) NOT NULL DEFAULT 'last_post_date',
  default_sort_direction varchar(5) NOT NULL DEFAULT 'desc',
  list_date_limit_days smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  require_prefix tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  allowed_watch_notifications varchar(10) NOT NULL DEFAULT 'all',
  PRIMARY KEY (node_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_prefix (
  node_id int(10) UNSIGNED NOT NULL,
  prefix_id int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (node_id,prefix_id),
  KEY prefix_id (prefix_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_read (
  forum_read_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userid int(10) UNSIGNED NOT NULL,
  node_id int(10) UNSIGNED NOT NULL,
  forum_read_date int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (forum_read_id),
  UNIQUE KEY user_id_node_id (userid,node_id),
  KEY node_id (node_id),
  KEY forum_read_date (forum_read_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_forum_watch (
  userid int(10) UNSIGNED NOT NULL,
  node_id int(10) UNSIGNED NOT NULL,
  notify_on enum('','thread','message') NOT NULL,
  send_alert tinyint(3) UNSIGNED NOT NULL,
  send_email tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (userid,node_id),
  KEY node_id_notify_on (node_id,notify_on)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_ip (
  ip_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userid int(10) UNSIGNED NOT NULL,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  action varbinary(25) NOT NULL DEFAULT '',
  ip varbinary(16) NOT NULL,
  log_date int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (ip_id),
  KEY user_id_log_date (userid,log_date),
  KEY ip_log_date (ip,log_date),
  KEY content_type_content_id (content_type,content_id),
  KEY log_date (log_date)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_liked_content (
  like_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  like_user_id int(10) UNSIGNED NOT NULL,
  like_date int(10) UNSIGNED NOT NULL,
  content_user_id int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (like_id),
  UNIQUE KEY content_type_id_like_user_id (content_type,content_id,like_user_id),
  KEY like_user_content_type_id (like_user_id,content_type,content_id),
  KEY content_user_id_like_date (content_user_id,like_date),
  KEY like_date (like_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_link_forum (
  node_id int(10) UNSIGNED NOT NULL,
  link_url varchar(150) NOT NULL,
  redirect_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (node_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderation_queue (
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  content_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (content_type,content_id),
  KEY content_date (content_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator (
  userid int(10) UNSIGNED NOT NULL,
  is_super_moderator tinyint(3) UNSIGNED NOT NULL,
  moderator_permissions mediumblob NOT NULL,
  extra_user_group_ids varbinary(255) NOT NULL,
  PRIMARY KEY (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator_content (
  moderator_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  moderator_permissions mediumblob NOT NULL,
  PRIMARY KEY (moderator_id),
  UNIQUE KEY content_user_id (content_type,content_id,userid),
  KEY user_id (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_moderator_log (
  moderator_log_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  log_date int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  ip_address varbinary(16) NOT NULL DEFAULT '',
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  content_userid int(10) UNSIGNED NOT NULL,
  content_username varchar(50) NOT NULL,
  content_title varchar(150) NOT NULL,
  content_url text NOT NULL,
  discussion_content_type varchar(25) NOT NULL,
  discussion_content_id int(10) UNSIGNED NOT NULL,
  action varchar(25) NOT NULL,
  action_params mediumblob NOT NULL,
  PRIMARY KEY (moderator_log_id),
  KEY log_date (log_date),
  KEY content_type_id (content_type,content_id),
  KEY discussion_content_type_id (discussion_content_type,discussion_content_id),
  KEY user_id_log_date (userid,log_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_node (
  node_id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  parent_id mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  title varchar(250) DEFAULT NULL COMMENT 'tên chuyên mục',
  alias varchar(250) DEFAULT NULL COMMENT 'liên kết tĩnh',
  description text NOT NULL COMMENT 'mô tả chuyên mục',
  image varchar(250) NOT NULL DEFAULT '' COMMENT 'Hình ảnh chuyên mục',
  `password` varchar(50) NOT NULL DEFAULT '' COMMENT 'mật khẩu chuyên mục',
  weight smallint(4) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Thứ tự chuyên mục',
  sort mediumint(8) NOT NULL DEFAULT '0',
  lev smallint(4) NOT NULL DEFAULT '0',
  node_type_id varchar(20) NOT NULL DEFAULT '' COMMENT 'node=1, forum=2, linkforum=3, page=4',
  numsubcat int(11) NOT NULL DEFAULT '0' COMMENT 'Đếm số chuyên mục con',
  subcatid varchar(250) NOT NULL DEFAULT '' COMMENT 'ID của chuyên mục con',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Trạng thái chuyên mục',
  date_added int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Ngày tạo chuyên mục',
  date_modified int(11) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Ngày cập nhật chuyên mục',
  PRIMARY KEY (node_id),
  UNIQUE KEY alias (alias),
  KEY parent_id (parent_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission (
  permission_id varbinary(25) NOT NULL,
  permission_group_id varbinary(25) NOT NULL,
  permission_type enum('flag','integer') NOT NULL,
  interface_group_id varbinary(50) NOT NULL,
  depend_permission_id varbinary(25) NOT NULL,
  display_order int(10) UNSIGNED NOT NULL,
  default_value enum('allow','deny','unset') NOT NULL,
  default_value_int int(11) NOT NULL,
  PRIMARY KEY (permission_id,permission_group_id),
  KEY display_order (display_order)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_cache_content (
  permission_combination_id int(10) UNSIGNED NOT NULL,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  cache_value mediumblob NOT NULL,
  PRIMARY KEY (permission_combination_id,content_type,content_id)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_combination (
  permission_combination_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userid int(10) UNSIGNED NOT NULL,
  user_group_list mediumblob NOT NULL,
  cache_value mediumblob NOT NULL,
  PRIMARY KEY (permission_combination_id),
  KEY user_id (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_combination_user_group (
  user_group_id int(10) UNSIGNED NOT NULL,
  permission_combination_id int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (user_group_id,permission_combination_id),
  KEY permission_combination_id (permission_combination_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_entry (
  permission_entry_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_group_id int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  permission_group_id varbinary(25) NOT NULL,
  permission_id varbinary(25) NOT NULL,
  permission_value enum('unset','allow','deny','use_int') NOT NULL,
  permission_value_int int(11) NOT NULL,
  PRIMARY KEY (permission_entry_id),
  UNIQUE KEY unique_permission (user_group_id,userid,permission_group_id,permission_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_entry_content (
  permission_entry_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  user_group_id int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  permission_group_id varbinary(25) NOT NULL,
  permission_id varbinary(25) NOT NULL,
  permission_value enum('unset','reset','content_allow','deny','use_int') NOT NULL,
  permission_value_int int(11) NOT NULL,
  PRIMARY KEY (permission_entry_id),
  UNIQUE KEY user_group_id_unique (user_group_id,userid,content_type,content_id,permission_group_id,permission_id),
  KEY content_type_content_id (content_type,content_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_group (
  permission_group_id varbinary(25) NOT NULL,
  addon_id varbinary(25) NOT NULL DEFAULT '',
  PRIMARY KEY (permission_group_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_permission_interface_group (
  interface_group_id varbinary(50) NOT NULL,
  display_order int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (interface_group_id),
  KEY display_order (display_order)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll (
  poll_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  question varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  responses mediumblob NOT NULL,
  voter_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  public_votes tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  max_votes tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  close_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  change_vote tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  view_results_unvoted tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (poll_id),
  UNIQUE KEY content_type_content_id (content_type,content_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll_response (
  poll_response_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  poll_id int(10) UNSIGNED NOT NULL,
  response varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  response_vote_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  voters mediumblob NOT NULL,
  PRIMARY KEY (poll_response_id),
  KEY poll_id_response_id (poll_id,poll_response_id)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_poll_vote (
  userid int(10) UNSIGNED NOT NULL,
  poll_response_id int(10) UNSIGNED NOT NULL,
  poll_id int(10) UNSIGNED NOT NULL,
  vote_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (poll_response_id,userid),
  KEY poll_id_user_id (poll_id,userid),
  KEY userid (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_post (
  post_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  thread_id int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  username varchar(50) NOT NULL,
  post_date int(10) UNSIGNED NOT NULL,
  message mediumtext NOT NULL,
  ip_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  message_state enum('visible','moderated','deleted') NOT NULL DEFAULT 'visible',
  attach_count smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  position int(10) UNSIGNED NOT NULL,
  likes int(10) UNSIGNED NOT NULL DEFAULT '0',
  like_users blob NOT NULL,
  warning_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  warning_message varchar(250) NOT NULL DEFAULT '',
  last_edit_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  last_edit_user_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  edit_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (post_id),
  KEY thread_id_post_date (thread_id,post_date),
  KEY thread_id_position (thread_id,position),
  KEY user_id (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_post_history (
  edit_history_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(10) UNSIGNED NOT NULL,
  edit_user_id int(10) UNSIGNED NOT NULL,
  edit_date int(10) UNSIGNED NOT NULL,
  old_text mediumtext NOT NULL,
  PRIMARY KEY (edit_history_id),
  KEY content_type (content_type,content_id,edit_date),
  KEY edit_date (edit_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_session_activity (
  userid int(10) UNSIGNED NOT NULL,
  unique_key varbinary(16) NOT NULL,
  ip varbinary(16) NOT NULL DEFAULT '',
  action varbinary(50) NOT NULL,
  view_state enum('valid','error') NOT NULL,
  params varbinary(100) NOT NULL,
  view_date int(10) UNSIGNED NOT NULL,
  robot_key varbinary(25) NOT NULL DEFAULT '',
  PRIMARY KEY (userid,unique_key) USING BTREE,
  KEY view_date (view_date) USING BTREE
) ENGINE=MEMORY ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag (
  tag_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  tag varchar(100) NOT NULL,
  tag_url varchar(100) NOT NULL,
  use_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  last_use_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  permanent tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (tag_id),
  UNIQUE KEY tag (tag),
  UNIQUE KEY tag_url (tag_url),
  KEY use_count (use_count)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag_content (
  tag_content_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  content_type varbinary(25) NOT NULL,
  content_id int(11) NOT NULL,
  tag_id int(10) UNSIGNED NOT NULL,
  add_user_id int(10) UNSIGNED NOT NULL,
  add_date int(10) UNSIGNED NOT NULL,
  visible tinyint(3) UNSIGNED NOT NULL,
  content_date int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (tag_content_id),
  UNIQUE KEY content_type_id_tag (content_type,content_id,tag_id),
  KEY tag_id_content_date (tag_id,content_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tag_result_cache (
  result_cache_id int(11) NOT NULL AUTO_INCREMENT,
  tag_id int(10) UNSIGNED NOT NULL,
  user_id int(10) UNSIGNED NOT NULL,
  cache_date int(10) UNSIGNED NOT NULL,
  expiry_date int(10) UNSIGNED NOT NULL,
  results mediumblob NOT NULL,
  PRIMARY KEY (result_cache_id),
  UNIQUE KEY tag_id_user_id (tag_id,user_id),
  KEY expiration_date (expiry_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread (
  thread_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  node_id int(10) UNSIGNED NOT NULL,
  title varchar(150) NOT NULL,
  reply_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  view_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  userid int(10) UNSIGNED NOT NULL,
  username varchar(50) NOT NULL,
  post_date int(10) UNSIGNED NOT NULL,
  sticky tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  discussion_state enum('visible','moderated','deleted') NOT NULL DEFAULT 'visible',
  discussion_open tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  discussion_type varchar(25) NOT NULL DEFAULT '',
  first_post_id int(10) UNSIGNED NOT NULL,
  first_post_likes int(10) UNSIGNED NOT NULL DEFAULT '0',
  last_post_date int(10) UNSIGNED NOT NULL,
  last_post_id int(10) UNSIGNED NOT NULL,
  last_post_user_id int(10) UNSIGNED NOT NULL,
  last_post_username varchar(50) NOT NULL,
  prefix_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  tags mediumblob NOT NULL,
  PRIMARY KEY (thread_id),
  KEY node_id_last_post_date (node_id,last_post_date),
  KEY node_id_sticky_state_last_post (node_id,sticky,discussion_state,last_post_date),
  KEY last_post_date (last_post_date),
  KEY post_date (post_date),
  KEY userid (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_read (
  thread_read_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  userid int(10) UNSIGNED NOT NULL,
  thread_id int(10) UNSIGNED NOT NULL,
  thread_read_date int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (thread_read_id),
  UNIQUE KEY user_id_thread_id (userid,thread_id),
  KEY thread_id (thread_id),
  KEY thread_read_date (thread_read_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_redirect (
  thread_id int(10) UNSIGNED NOT NULL,
  target_url text COLLATE utf8mb4_unicode_ci NOT NULL,
  redirect_key varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  expiry_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (thread_id),
  KEY redirect_key_expiry_date (redirect_key,expiry_date)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_reply_ban (
  thread_reply_ban_id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  thread_id int(10) UNSIGNED NOT NULL,
  userid int(10) UNSIGNED NOT NULL,
  ban_date int(10) UNSIGNED NOT NULL,
  expiry_date int(10) UNSIGNED DEFAULT NULL,
  reason varchar(100) NOT NULL DEFAULT '',
  ban_user_id int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (thread_reply_ban_id),
  UNIQUE KEY thread_id (thread_id,userid),
  KEY expiry_date (expiry_date),
  KEY userid (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_user_post (
  thread_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  userid int(10) UNSIGNED NOT NULL DEFAULT '0',
  post_count int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (thread_id,userid),
  KEY user_id (userid)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_view (
  thread_id int(10) UNSIGNED NOT NULL,
  KEY thread_id (thread_id)
) ENGINE=MEMORY ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thread_watch (
  userid int(10) UNSIGNED NOT NULL,
  thread_id int(10) UNSIGNED NOT NULL,
  email_subscribe tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (userid,thread_id),
  KEY thread_id_email_subscribe (thread_id,email_subscribe)
) ENGINE=MYISAM ";


$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_users_privacy (
  userid int(10) UNSIGNED NOT NULL,
  allow_view_profile enum('everyone','members','followed','none') NOT NULL DEFAULT 'everyone',
  allow_post_profile enum('everyone','members','followed','none') NOT NULL DEFAULT 'everyone',
  allow_send_personal_conversation enum('everyone','members','followed','none') NOT NULL DEFAULT 'everyone',
  allow_view_identities enum('everyone','members','followed','none') NOT NULL DEFAULT 'everyone',
  allow_receive_news_feed enum('everyone','members','followed','none') NOT NULL DEFAULT 'everyone',
  PRIMARY KEY (userid)
) ENGINE=MYISAM ";

$sql_create_module[] = "CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $module_data . "_users_profile (
  userid int(10) UNSIGNED NOT NULL,
  dob_day tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  dob_month tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  dob_year smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  status text NOT NULL,
  status_date int(10) UNSIGNED NOT NULL DEFAULT '0',
  status_profile_post_id int(10) UNSIGNED NOT NULL DEFAULT '0',
  signature text NOT NULL,
  homepage text NOT NULL,
  location varchar(50) NOT NULL DEFAULT '',
  occupation varchar(50) NOT NULL DEFAULT '',
  following text NOT NULL COMMENT 'Comma-separated integers from nv4_users_follow',
  ignored text NOT NULL COMMENT 'Comma-separated integers from nv4_users_ignored',
  csrf_token varchar(40) NOT NULL COMMENT 'Anti CSRF data key',
  avatar_crop_x int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'X-Position from which to start the square crop on the m avatar',
  avatar_crop_y int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Y-Position from which to start the square crop on the m avatar',
  about text NOT NULL,
  custom_fields mediumblob NOT NULL,
  external_auth mediumblob NOT NULL,
  password_date int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (userid),
  KEY dob (dob_month,dob_day,dob_year)
) ENGINE=MYISAM ";
