<?php
/**
* 
*/

namespace WCFE\Libraries;

/**
* 
*/
class ParseString
{

	/**
	* put your comment there...
	* 
	* @var mixed
	*/
	protected $data = array();
	
	/**
	* put your comment there...
	* 
	* @param mixed $string
	* @return WCFEParserString
	*/
	public function __construct( $string ) 
	{
		$this->parse( $string );
	}
	
	/**
	* put your comment there...
	* 
	*/
	public function & getData()
	{
		return $this->data;
	}
  
	/**
	* put your comment there...
	* 
	* @param mixed $string
	*/
	protected function parse( $rawData )
	{
		
		# Split into vars
		$vars = explode( '&', $rawData );
		
		# FOr each var get name and valie operands
		foreach ( $vars as $name )
		{
			
			# Get name value pairs
			$operands = explode( '=', $name );
			
			# Decode name and value
			$varName = urldecode( $operands[ 0 ] );
			$varValue = urldecode( $operands[ 1 ] );
			
			# Pretend that var name as child of DUMMY POST array
			preg_match( '/([a-zA-Z0-9-_]+)/', $varName, $varBaseName );
			$varBaseName = $varBaseName[ 0 ];
			
			# Get array names
			preg_match_all( '/\[([^\]]*)\]/', $varName, $arrayNames, PREG_SET_ORDER );
						
			array_unshift( $arrayNames, array( "[{$varBaseName}]", $varBaseName ) );
			
			# Last element is the value element
			$valueElementName = array_pop( $arrayNames );
			$valueElementName = $valueElementName[ 1 ];
			
			# Move inside until reaching the target element parent
			$pointer =& $this->data;
			
			foreach ( $arrayNames as $arrayName )
			{
				$elementName = $arrayName[ 1 ];
				
				if ( ! isset( $pointer[ $elementName ] ) )
				{
					$pointer[ $elementName ] = array();
				}
				
				$pointer =& $pointer[ $elementName ];
			}
			
			# Set element value
			if ( trim( $valueElementName ) ) 
			{
				$pointer[ $valueElementName ] = $varValue;	
			}
			else 
			{
				$pointer[ ] = $varValue;	
			}
			
			# Get outside to the root and repeat!
			$pointer =& $this->data;
		}
		
		return $this;
	}

	/**
	* put your comment there...
	* 
	* @param mixed $string
	* @return WCFEPostRequestRawParser
	*/
	public static function & parseString( $string )
	{
		$instance = new ParseString( $string );
		
		return $instance->getData();
	}
	
}