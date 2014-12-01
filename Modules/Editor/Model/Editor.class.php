<?php
/**
* 
*/

namespace WCFE\Modules\Editor\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class EditorModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $configFileContent;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	private $form;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $isBackForChange = false;
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $savedVars = array();
	
	/**
	* put your comment there...
	* 
	*/
	public function & clearState() {
		# Clear state
		$this->configFileContent = null;
		$this->savedVars = array();
		$this->isBackForChange = false;
		# Chain
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function generateConfigFile() {
		# Generate config file 
		$configFile = new ConfigFile\Templates\Master\Master($this->getForm());
		# Set config file content.
		$this->setConfigFileContent((string) $configFile);
		# Chain
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function getConfigFileContent() {
		return $this->configFileContent;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getForm() {
		return $this->form;
	}

	/**
	* put your comment there...
	* 
	*/
	public function isBackForChange() {
		return $this->isBackForChange;
	}
	
	/**
	* put your comment there...
	* 
	*/
	protected function initialize() {
		# Creating config form
		$this->form = new Forms\ConfigFileForm();
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromConfigFile() {
		# Read fields value from Wordpress config file
		$form =& $this->getForm();
		foreach ($form->getFields() as $field) {
			# Force field to read data from config file
			$field->read();
		}
		# Chain
		return $this;
	}

	/**
	* put your comment there...
	* 
	*/
	public function & loadFromSaveState() {
		# Load model form from saved vars
		$this->getForm()->setValue($this->savedVars);
		# Chain
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $content
	*/
	public function & setConfigFileContent($content) {
		# Set
		$this->configFileContent =& $content;
		# Chain
		return $this;
	}
	
	/**
	* put your comment there...
	* 
	*/
  public function & saveConfigFile() {
		# Config File path
		$configFilePath = ABSPATH . 'wp-config.php';
		$successed = false;
		# Check permissions
		if (!is_readable($configFilePath) || !is_writable($configFilePath)) {
			$this->addError("Config file is not writable: {$configFilePath}");
		}
		else {
			# Save config file
			if (!file_put_contents($configFilePath, $this->getConfigFileContent())) {
				$this->addError("Could not write config file: {$configFilePath}");
			}
			else {
				# Return successed
				$successed = true;
			}
		}
		return $successed;
  }

	/**
	* put your comment there...
	* 
	*/
	public function & saveSubmittedVars() {
		# Initiaize
		$form =& $this->getForm();
		# Set back for changes flag to true
		$this->isBackForChange = true;
		# Save form fields to be used later by 
		# other actions
		$this->savedVars = array($form->getName() => $form->getValue());
		# Chain
		return $this;
	}

}
