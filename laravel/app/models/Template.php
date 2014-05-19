<?php
class Template{
	public static function All(){
		$dir    = public_path().'/templates';
		$files = scandir($dir);
		array_shift($files);
		array_shift($files);
		
		$templates = array();
		
		for($i = 0;$i < count($files);$i++){
			if(substr($files[$i], -strlen('.php')) != '.php'){
				// Not A PHP file
				continue;
			}
		
			$templateLocation = $files[$i];
			$files[$i] = str_replace('.blade.php', '', $files[$i]);
			$files[$i] = str_replace('.php', '', $files[$i]);
			
			$templates[$templateLocation] = $files[$i]." - ".$templateLocation;
		}
		return $templates;
	}
	
	public static function exists($template){
		return file_exists(public_path().'/templates'.$template);
	}
	
	public static function fileToTemplate($file){
		$file = str_replace('.blade.php', '', $file);
		$file = str_replace('.php', '', $file);
		return $file;
	}
}