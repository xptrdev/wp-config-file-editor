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
	* @var mixed
	*/
	protected $profileVarsTStorage = array();

	/**
	* put your comment there...
	* 
	* @param mixed $vars
	*/
	public function createProfileVarsTStorage( $vars )
	{
		
		$id = md5( uniqid() );
		
		# For now we just need single storage
		$this->profileVarsTStorage = array( $id => $vars );
		
		return $id;
		
	}
	
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
		
		$this->addError( $this->__( '%d profiles deleted', $deletedRecords ) );
		
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
	* @param mixed $storageId
	*/
	public function saveProfile( Profile & $profile, $storageId )
	{
		if ( $profile->id )
		{
			if ( ! $currentProfile = $this->getProfile( $profile->id ) )
			{
				
				$this->addError( $this->__( 'Profile doesnt exists!!!' ) );

				return false;
			}
			
			$profile->vars = $currentProfile->vars;
			
			$this->setMessage( $this->__( 'Profile Updated successfuly' ) );
			
		}
		else
		{
			# Generate new id
			$profile->id = sanitize_title( $profile->name );
			
			# Insert vars too if there is storage Id specifed
			if ( $storageId )
			{
				# Copy vars to profile vars
				$profile->vars = $this->profileVarsTStorage[ $storageId ];
				
				# Reset temporary storage
				$this->profileVarsTStorage = array();
			}
			
			$this->setMessage( $this->__( 'Profile Added successfuly' ) );
		}
		
		# Update or Insert
		$this->profiles[ $profile->id ] = $profile->getArray();
		
		return $profile->id;
	}

	/**
	* put your comment there...
	* 
	* @param Profile $profile
	*/
	public function updateProfileVars( Profile & $profile )
	{
		if ( ! isset( $this->profiles[ $profile->id ] ) )
		{
			
			$this->addError( $this->__( 'Profile doesn\'t exists' ) );
			
			return false;
		}
		
		$this->profiles[ $profile->id ][ 'vars' ] = $profile->vars;
		
		return true;
	}

	/**
	* put your comment there...
	* 
	* @param Profile $profile
	*/
	public function validate( Profile & $profile )
	{
		
		# ALways valid when editing, adding new valid only if name doesn't exists
		return ( $profile->id || ( ! $profile->id && ! isset( $this->profiles[ $profile->id ] ) ) );
		
	}

}