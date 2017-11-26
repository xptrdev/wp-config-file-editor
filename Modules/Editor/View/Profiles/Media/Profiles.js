
/**
* put your comment there...
* 
*/


/**
* put your comment there...
* 
* @type T_JS_FUNCTION
*/
WCFEProfilesList = new function()
{
    
    this._onprofilecreated = function( profile )
    {
        window.location.reload();
    }
    this._onprofileupdated  = function( profile )
    {
        window.location.reload();
    };
    
};

/**
* 
*/
jQuery( function() {
    
    var $ = jQuery;
    
    $( '#wcfe-profiles-list-menu' ).menu({ position: { my: "left top", at: "left bottom" },
        select : function(event)
        {
            switch ( event.srcElement.id )
            {
                case 'wcfe-profiles-list-menu-delete':
                
                    if ( confirm( WCFEProfilesL10N.confirm_deleteSelected ) )
                    {
                        $( '#wcfe-grid-table-form' ).submit();    
                    }
                    
                break;
                
                case 'wcfe-profiles-list-menu-create':
                    
                    tb_show( WCFEProfilesL10N.title_createProfile, actionsRoute[ 'editProfile' ] + '&caller=WCFEProfilesList&TB_iframe=true' );
                    
                break;
            }
        }
    });
    
    
    $( '#wcfe-table-grid-selectall' ).change(
        function()
        {
            $( '.wcfe-grid-table input[name="id[]"]' ).prop( 'checked', $( this ).prop( 'checked' ) );
        }
    );
    
    
    // Notify config form window
    $( '.wcfe-select-profile' ).click(
    
        function()
        {
            
            // Create compatible profile object similar to
            // the one recivied by server. Aggregat
            // profile data from greid row
            
            ///////// This is not currently being used however leav it for a while to make ///////
            //////// sure I don't need it /////////
            var profile = {};
            var profileId = this.href.substring( this.href.indexOf( '#' ) + 1 );
            var profileFields = $( '.wcfe-grid-table #profile-row-' + profileId + ' td span.profile-field' ).each(
                function( )
                {
                    
                    var jField = $( this );
                    
                    // Last word in last class is the field name 
                    var fieldName = this.className.split( '-' )[ 2 ];
                    
                    profile[ fieldName ] = jField.text();
                    
                }
            );
            
            // Callback with selected profile object
            var callback = window.parent.WCFEEditorForm._onselectprofile;
            
            callback( profileId );
        }
    );
    
    // Edit Profile
    $( '.wcfe-edit-profile' ).click(
        function( event )
        {
            
            tb_show( 'Edit Profile', event.target.href + '&caller=WCFEProfilesList&TB_iframe=true' );
            
            return false;
        }
    );
    
    // Notify when ready
    window.parent.WCFEEditorForm._onprofilesdialogready();
    
    // Disallow deleteing active profile
    var gridTable = $( '.wcfe-grid-table' );
    var profile = window.parent.WCFEEditorForm.profile.getProfile()
    if ( profile )
    {
        var activeProfileCheckbox = gridTable.find( '#profile-row-' + profile.id + ' input[type="checkbox"]');
        activeProfileCheckbox.parent().append( '<span class="active-profile-state">Active</span>' );
        activeProfileCheckbox.remove();
    }
    
    gridTable.show(); // Its hidding by inline style attribute
} );