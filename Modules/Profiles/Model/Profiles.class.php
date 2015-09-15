<?php
/**
* 
*/

namespace WCFE\Modules\Profiles\Model;

# Models Framework
use WPPFW\MVC\Model\PluginModel;

/**
* 
*/
class ProfilesModel extends PluginModel {
	
	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $profiles = array();
	
	/**
	* put your comment there...
	* 
	* @param mixed $ids
	*/
	public function delete( $ids )
	{
		
		$deletedRecords = 0;
		
		foreach ( $ids as $profileId )
		{
			if ( isset( $this->profiles[ $profileId ] ) )
			{
				
				unset( $this->profiles[ $profileId ] );
				
				$deletedRecords ++;
			}
			
		}
		
		$this->addError( "{$deletedRecords} profiles deleted" );
		
		return true;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $id
	*/
	public function getProfile( $id ) 
	{
		
		if ( isset( $this->profiles[ $id ] ) )
		{
			$profile = new Profile( $this->profiles[ $id ] );
			
			return $profile;
		}
		
		return false;
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function getProfiles()
	{
		
		$profiles = array();
		
		foreach ( $this->profiles as $profileData )
		{
			
			$profiles[] = new Profile( $profileData );
		}
		
		return $profiles;
	}

	/**
	* put your comment there...
	* 
	* @param Profile $profile
	*/
	public function saveProfile( Profile & $profile )
	{
		if ( $profile->id )
		{
			if ( ! $this->getProfile( $profile->id ) )
			{
				
				$this->addError( 'Profile doesnt exists!!!' );

				return false;
			}
			
			$this->setMessage( 'Profile Updated successfuly' );
			
		}
		else
		{
			# Generate new id
			$profile->id = sanitize_title( $profile->name );
			
			$this->setMessage( 'Profile Added successfuly' );
		}
		
		# Update or Insert
		$this->profiles[ $profile->id ] = $profile->getArray();
		
		return true;
	}

	/**
	* put your comment there...
	* 
	* @param Profile $profile
	*/
	public function validate( Profile & $profile )
	{
		return true;
	}

}