function send_create_profile_request()
{

    var url = 'common/ajax.php';
    var map = {
        email: $( '#email' ).val(),
        name: $( '#name' ).val(),
        age: $( '#age' ).val(),
        gender: $( '#gender' ).val(),
        music: $( '#music' ).val()
    };

    var validation = validate_input( map );

    if( validation != null )
    {
        alert( validation );
        return false;
    }

    $.ajax({
        url : url,
        data : map,
        dataType: 'json'
    }).done( function (doc, text_status)
    {
        receive_create_profile_response( doc, text_status );
    });
}

function receive_create_profile_response( doc, text_status )
{
    if( doc.success == true )
    {
        alert( "Your response has been recorded " + doc.message + "!" );
    }
    else
    {
        alert( "There was an error. Please contact support." );
    }
}

function validate_input( map )
{
    if( typeof map.email != 'string' )
    {
        return 'Email is not a string';
    }

    if(  typeof map.name  != 'string' )
    {
        return 'Name is not a string';
    }


    if(  typeof map.gender != 'string' )
    {
        return 'Gender is not a string';
    }


    if(  typeof map.music  != 'string' )
    {
        return 'Music is not a string';
    }

    if( isNaN( map.age ) || map.age < 1)
    {
        return 'Age must be a number greater than 1';
    }
    
    if( typeof map.email  > 100 )
    {
        return 'Email is too long. Must be shorter than 100 characters.';
    }

    if( typeof map.name   > 100 )
    {
        return 'Name is too long. Must be shorter than 100 characters.';
    }

    if( typeof map.music  > 100 )  
    {
        return 'Music is too long. Must be shorter than 100 characters.';
    }

    if( !( map.gender === 'male' || map.gender === 'female' ) )
    {
        return 'Male or Females only: ' + map.gender;
    }

    return null;
}
