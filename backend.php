<?php
#include '../../../db_connect.php';
#include '../../../vendors/isu/isu.php';

if(isset( $_GET['uploadfiles'])){
	//sys_variables
	//$create_time = time();
	//$error = false;
	//$files = array();
	//$current_date = date('y-m-d');
	$date = date('y-m-d');
	
		//$query_conf_upload = "SELECT * FROM configurations WHERE `key` = 'upload_path';";
		//$result_conf_upload = $pdo -> query($query_conf_upload);
		//$data_conf_upload = $result_conf_upload -> fetchAll();
	//$uploaddir = $data_conf_upload[0]['value'] . $date . '/';
	$uploaddir = '/var/www/html/z_upload/example/temp/' . $date . '/';
	//$uploaddir = '/var/www/html/z_upload/example/temp/';	
		//$fd = fopen("e:\\file.debug", "ab");
		//	fwrite($fd, $uploaddir  . "\n");
		//fclose($fd);
	
	
	//if (isset($_POST)){
		#foreach($_POST as $current_key => $current_val){
		#	$curr_action = explode("_", $current_key);
			
		#	if ($curr_action[0] == "in"){
		#		$query_array[$curr_action[1]] = $current_val;
	#		}
	#		
	#		else if ($curr_action[0] == "ex"){
	#			$array_exclude[$curr_action[1]] = $current_val;
	#		}
	#	}
		
		
		// То что будет использоваться в 
		//$query_array = $_POST;
		
		
		
		//Запись в таблице f_publications
#		$query_insert = void_insert("f_publications", $query_array);
#		$result_update = $pdo -> query($query_insert);
#		$pub_id = $pdo -> lastInsertId();
		
		//Запись в таблице acl_list (права группы создателя)
#		$tick =  $array_exclude['tick'];
#		$qu = "SELECT udepartment FROM m_account_users WHERE ticket = '$tick';";
#		$res = $pdo -> query($qu);
#		$data= $res->fetchAll();	
		
#		$array_acl = ["linked_group_id" => $data[0]['udepartment'], "linked_pub_id" => $pub_id ];
#		$query_acl = void_insert("acl_list", $array_acl);
#		$pdo -> query($query_acl);
		//$fd = fopen("e:\\file.debug", "ab");
		//		fwrite($fd, $query_acl . "\n");
		//fclose($fd);
	//}
	
	//work with file
	foreach( $_FILES as $file ){	
		if(!is_dir($uploaddir)) 
			mkdir($uploaddir, 0777);
		$codename = hash('ripemd160', microtime() . rand(0, 9999));
		//$type = $file['type'];
		//$name = $file['name'];
		
		$ext='';
		//if ($type == 'application/vnd.ms-excel') $ext = '.xls';
		//else if ($type == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') $ext = '.xlsx';
		$path = $uploaddir . $codename . $ext;
		//$dbpath = $codename . $ext;
		if( move_uploaded_file( $file['tmp_name'], $path ) ){
			
			//Запись в таблице f_attachments (Вложение файла)
			//$att_array = ["file_name" => $name, "file_type" => $type, "linked_publication" => $pub_id ];
			//$query_att_insert = void_insert("f_attachments", $att_array);
			//$result_att_insert = $pdo -> query($query_att_insert);
			//$att_id = $pdo -> lastInsertId();
			
			
			//Запись в таблицу f_version (Конкретная версия файла)
			//$vers_array = ["linked_attachment" => $att_id, "file_path" => $dbpath, "file_dir" => $date];
			//$query_vers_insert = void_insert("f_versions", $vers_array);
			///$result_vers_insert = $pdo -> query($query_vers_insert);
			
			
			
			//$r_path = $uploaddir . $codename;
			//$files[] = realpath($r_path);
			//$dw_path = $codename . $ext;
			
		}
		else $error = true;
	}
}
?>