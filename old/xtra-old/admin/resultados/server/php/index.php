<?php
// Local
/*
$options = array(
    'delete_type' => 'POST',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'speedx',
    'db_table' => 'files'
);
*/
// Remoto
$options = array(
		'delete_type' => 'POST',
		'db_host' => 'speedcombr.ipagemysql.com',
		'db_user' => 'speedx',
		'db_pass' => 'matrix@1477',
		'db_name' => 'speedx',
		'db_table' => 'files'
);

error_reporting(E_ALL | E_STRICT);
require('../../xtra-old/admin/resultados/server/php/UploadHandler.phpd/xtra-old/UploadHandler.php');

class CustomUploadHandler extends UploadHandler {

    protected function initialize() {
        $this->db = new mysqli(
            $this->options['db_host'],
            $this->options['db_user'],
            $this->options['db_pass'],
            $this->options['db_name']
        );
        parent::initialize();
        $this->db->close();
    }

    protected function handle_form_data($file, $index) {
    	$file->dt_envio		= date('Y-m-d H:i:s');
		$file->id_cad 		= @$_REQUEST['id_cadastro'];
        $file->id_exame		= @$_REQUEST['id_tipo'];
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null) {
        	$file = parent::handle_file_upload(  $uploaded_file, $name, $size, $type, $error, $index, $content_range
        );
        	
        if (empty($file->error)) {

        	$sql = 'INSERT INTO `'.$this->options['db_table']
            .'` (`id_cadastro`, `id_tipo_exame`, `dt_upload`, `name`, `size`, `type`)'
            .' VALUES (?, ?, ?, ?, ?, ?)';
            
            $query = $this->db->prepare($sql);
            $query->bind_param(
                'iissis',
                $file->id_cad,
                $file->id_exame,
                $file->dt_envio,
                $file->name,
                $file->size,
                $file->type
            );
            $query->execute();
            $file->id = $this->db->insert_id;
        }
        return $file;
    }
    
	// Define colunas adicionais para o get.
    protected function set_additional_file_properties($file) {
        parent::set_additional_file_properties($file);
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $sql = "SELECT id, type, title, description, date_format( dt_upload, '%d/%m/%Y' )  as dt_upload FROM  ".$this->options['db_table']." WHERE name=?";
            
           // echo $sql;
            $query = $this->db->prepare($sql);
            $query->bind_param('s', $file->name);
            $query->execute();
            $query->bind_result(
                $id,
                $type,
                $title,
                $description,
            	$dt_upload
            );
            
            while ($query->fetch()) {
                $file->id = $id;
                $file->type = $type;
                $file->title = $title;
                $file->description = $description;
                $file->dt_upload = $dt_upload;
            }
        }
    }

    public function delete($print_response = true) {
        $response = parent::delete(false);
        foreach ($response as $name => $deleted) {
            if ($deleted) {
                $sql = 'DELETE FROM `'
                    .$this->options['db_table'].'` WHERE `name`=?';
                $query = $this->db->prepare($sql);
                $query->bind_param('s', $name);
                $query->execute();
            }
        } 
        return $this->generate_response($response, $print_response);
    }

}

$upload_handler = new CustomUploadHandler($options);