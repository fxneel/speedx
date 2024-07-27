  <?php
		function my_file_get_contents($site_url) {
			$ch = curl_init ();
			$timeout = 10;
			curl_setopt ( $ch, CURLOPT_URL, $site_url );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
			$file_contents = curl_exec ( $ch );
			curl_close ( $ch );
			return $file_contents;
		}
		function getSkypeStatus($username) {
			// 1: OFF 2: ON
			$remote_status = my_file_get_contents ( 'http://mystatus.skype.com/' . $username . '.num' );
			return ($remote_status === false) ? '0' : trim ( $remote_status );
		}
		
		function showSkypeButton($username) {
			$status = getSkypeStatus ( $username );
			echo '<a href="skype:' . $username . '?chat">'; // Chat ou Call
			echo '<img src="images/' . $status . '.png" alt="Ligar ' . $username . '">';
			echo '</a>';
		}
		
		// Função a ser chamada no site.
		// showSkypeButton ( 'speedx.radiologia' );
		?>
