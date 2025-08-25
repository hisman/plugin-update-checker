<?php
namespace YahnisElsts\PluginUpdateChecker\v5p6;

use stdClass;

if ( !class_exists(Update::class, false) ):

	/**
	 * A simple container class for holding information about an available update.
	 *
	 * @author Janis Elsts
	 * @access public
	 */
	abstract class Update extends Metadata {
		public $slug;
		public $version;
		public $download_url;
		public $translations = array();
		public $auto_update_forced;

		/**
		 * @return string[]
		 */
		protected function getFieldNames() {
			return array('slug', 'version', 'download_url', 'translations', 'auto_update_forced');
		}

		public function toWpFormat() {
			$update = new stdClass();

			$update->slug = $this->slug;
			$update->new_version = $this->version;
			$update->package = $this->download_url;
			$update->{'auto-update-forced'} = $this->auto_update_forced;

			return $update;
		}
	}

endif;
